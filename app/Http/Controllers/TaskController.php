<?php

namespace App\Http\Controllers;

use App\Contracts\RoleRepositoryInterFace;
use App\Contracts\StatusRepositoryInterface;
use App\Contracts\TaskRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Http\Requests\TaskCreationRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
        private RoleRepositoryInterFace $roleRepository,
        private StatusRepositoryInterface $statusRepository,
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function index(Request $request)
    {
        $projectCode = $request->filled('project_code') ? $request->get('project_code') : '';
        $assignedTo = $request->filled('user_ids') ? $request->get('user_ids') : [];
        $statusId = $request->filled('status_id') ? $request->get('status_id') : null;

        if ($this->roleRepository->getLoggedinUserRole() == RolesEnum::TEAM_MEMBER) {
            $assignedTo = [auth()->user()->id];
        }

        $tasks = $this->taskRepository->filter($projectCode, $assignedTo, $statusId);

        return view('tasks.index', [
            'tasks' => $this->taskRepository->paginate($tasks),
            'statuses' => $this->statusRepository->findAll(),
            'users' => $this->userRepository->getTeamMembersWithoutPagination(),
        ]);
    }

    public function create(Project $project)
    {
        return view('tasks.create', [
            'project' => $project,
            'statuses' => $this->statusRepository->findAll(),
        ]);
    }

    public function store(TaskCreationRequest $request)
    {
        $this->taskRepository->create($request->all());

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task,
            'statuses' => $this->statusRepository->findAll(),
            'users' => $this->userRepository->getTeamMembersWithoutPagination(),
        ]);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $this->taskRepository
            ->update($task, $request->all());

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $this->taskRepository
            ->destroy($task->id);

        return redirect()->route('tasks.index');
    }

    public function assign(Request $request, $id)
    {
        $request->validate([
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'required|int',
        ]);

        $userIds = $request->filled('user_ids') ? $request->get('user_ids') : [];

        $this->taskRepository
            ->assignToUsers($id, $userIds);

        return redirect()->back();
    }
}
