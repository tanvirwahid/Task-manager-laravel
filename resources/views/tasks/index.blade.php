@extends('layouts.layout')

@section('content')

<div class="w-screen max-w-full bg-white p-8 rounded-lg mx-auto">
    <h2 class="text-xl font-semibold">Tasks</h2>
    <div class="flex justify-between mb-4">
        <div class="container flex">

            <form action="{{route('tasks.index')}}" method="GET" class="flex">
                <input type="text" name="project_code" class="border-2 border-gray-600 rounded max-h-10 max-w-40" placeholder="project code">

                <select id="status_id" name="status_id" class="border-2 border-gray-600 rounded max-h-10 max-w-fit">
                    <option value="">Status</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach

                </select>

                <select id="user_ids" name="user_ids[]" class="select2-multiple form-control border-2 border-gray-600 rounded max-h-10 "
                        multiple="multiple">
                    <option></option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded max-h-10">Search</button>
            </form>

        </div>

    </div>

    <table class="w-full table-auto">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Project Code</th>
            <th class="px-4 py-2">Description</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
        <tr>
            <td class="border px-4 py-2 text-center">{{$task->name}}</td>
            <td class="border px-4 py-2 text-center">{{$task->project_code}}</td>
            <td class="border px-4 py-2 text-center">{{$task->description}}</td>
            <td class="border px-4 py-2 text-center">{{$task->status->name}}</td>

            <td class="border px-4 py-2 text-center">
                <a href="{{route('tasks.edit', ['task' => $task->id])}}" class="text-blue-500 hover:text-blue-600 px-2">Edit</a>
                <form action="{{route('tasks.delete', ['task' => $task->id])}}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600 px-2" onclick="confirmDelete(this)">Delete</button>
                </form>
                @csrf
                @method('DELETE')
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{$tasks->links()}}
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select team members",
            allowClear: true
        });

    });

    function confirmDelete(form) {
        if (confirm('Are you sure you want to delete this task?')) {
            $(form).submit();
        }
    }

</script>

@endsection
