@extends('layouts.layout')

@section('content')

<div class="max-w-md w-full max-h-fit bg-white p-8 rounded-lg">
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2" >Name</label>
            <input id="name" type="text" name="name" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ old('name') }}" required autofocus>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description</label>
            <textarea id="description" type="text" name="description" class="border-2 border-gray-600 rounded-lg p-2 w-full" required autofocus>{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-bold mb-2">Status</label>
            <select id="status_id" name="status_id" class="border-2 border-gray-600 rounded-lg p-2 w-full" required autofocus>
                @foreach($statuses as $status)
                <option value="{{ $status->id }}" >{{ $status->name }}</option>
                @endforeach

            </select>
            @error('status_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <input hidden="hidden" id="project_code" name="project_code" value="{{$project->code}}">

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
        </div>

    </form>

</div>

@endsection
