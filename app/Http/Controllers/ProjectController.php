<?php

namespace App\Http\Controllers;

use App\Contracts\ProjectRepositoryInterface;
use App\Http\Requests\ProjectCreationRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(private ProjectRepositoryInterface $projectRepository)
    {
    }

    public function index(Request $request)
    {
        $name = $request->filled('name')?$request->get('name'): '';
        $projects = $this->projectRepository
            ->filterByName($name);

        return view('projects.index', ['projects' => $this->projectRepository->paginate($projects)]);
    }

    public function create(Project $project)
    {
        return view('projects.create', ['project' => $project]);
    }

    public function store(ProjectCreationRequest $request)
    {
        $this->projectRepository->create($request->all());

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $this->projectRepository
            ->update($project, $request->all());

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $this->projectRepository->destroy($project->id);

        return redirect()->back();
    }
}
