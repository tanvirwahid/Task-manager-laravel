@extends('layouts.layout')

@section('content')

<div class="max-w-md w-full bg-white p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Edit Team Member</h2>
    <form method="POST" action="{{route('users.update', ['user' => $user->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2" >Full Name</label>
            <input id="name" type="text" name="name" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ $user->name }}" required autofocus>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="employee_id" class="block text-sm font-bold mb-2">Employee Id</label>
            <input id="employee_id" type="text" name="employee_id" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ $user->employee_id }}" required autofocus>
            @error('employee_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="position" class="block text-sm font-bold mb-2">Position</label>
            <input id="position" type="text" name="position" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ $user->position }}" required autofocus>
            @error('position')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-bold mb-2">Email Address</label>
            <input id="email" type="email" name="email" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ $user->email }}" required autofocus>
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">update</button>
        </div>

    </form>

</div>

@endsection
