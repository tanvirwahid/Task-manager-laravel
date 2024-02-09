@extends('layouts.layout')

@section('content')
<div class="w-screen max-w-full bg-white p-8 rounded-lg mx-auto">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold">Projects</h2>
        <a href="{{route('projects.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Add Project
        </a>
    </div>

    <table class="w-full table-auto">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Project Code</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
        <tr>
            <td class="border px-4 py-2 text-center">{{$project->code}}</td>
            <td class="border px-4 py-2 text-center">{{$project->name}}</td>
            <td class="border px-4 py-2 text-center">
                <a href="{{route('projects.edit', ['project' => $project->id])}}" class="text-blue-500 hover:text-blue-600 px-2">Edit</a>
                <form action="{{route('projects.delete', ['project' => $project->id])}}" method="POST" class="inline">
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

    {{$projects->links()}}
</div>

<script>
    function confirmDelete(form) {
        if (confirm('Are you sure you want to delete this project?')) {
            $(form).submit();
        }
    }
</script>

@endsection
