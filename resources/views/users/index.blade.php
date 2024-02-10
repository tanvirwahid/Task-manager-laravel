@extends('layouts.layout')

@section('content')
<div class="w-screen max-w-full bg-white p-8 rounded-lg mx-auto">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold">Team Members</h2>
        <a href="{{route('users.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Add User
        </a>
    </div>

    <table class="w-full table-auto">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Employee ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Position</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td class="border px-4 py-2 text-center">{{$user->employee_id}}</td>
            <td class="border px-4 py-2 text-center">{{$user->name}}</td>
            <td class="border px-4 py-2 text-center">{{$user->email}}</td>
            <td class="border px-4 py-2 text-center">{{$user->position}}</td>
            <td class="border px-4 py-2 text-center">
                <a href="{{route('users.edit', ['user' => $user->id])}}" class="text-blue-500 hover:text-blue-600 px-2">Edit</a>
                <form action="{{route('users.delete', ['user' => $user->id])}}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600 px-2"
                            onclick="confirmDelete(
                                this,
                                'Are you sure want to delete this employee?'
                                )">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{$users->links()}}
</div>
@include('reusables.delete-form-submitter')

@endsection
