@extends('layouts.layout')

@section('content')

<div class="max-w-md w-full max-h-fit bg-white p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Create Project</h2>
    <form method="POST" action="{{route('projects.store')}}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2" >Name</label>
            <input id="name" type="text" name="name" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ old('name') }}" required autofocus>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="code" class="block text-sm font-bold mb-2">Project Code</label>
            <input id="code" type="text" name="code" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ old('code') }}" required autofocus>
            @error('code')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
        </div>

    </form>

</div>

@endsection
