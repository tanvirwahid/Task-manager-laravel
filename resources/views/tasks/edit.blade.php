@extends('layouts.layout')

@section('content')

<div class="max-w-md w-full max-h-fit bg-white p-8 rounded-lg">
    <form method="POST" action="{{route('tasks.update', ['task' => $task->id])}}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2" >Name</label>
            <input id="name" type="text" name="name" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ $task->name }}" required autofocus>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description</label>
            <textarea id="description" type="text" name="description" class="border-2 border-gray-600 rounded-lg p-2 w-full" required autofocus>{{$task->description}}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-bold mb-2">Status</label>
            <select id="status_id" name="status_id" class="border-2 border-gray-600 rounded-lg p-2 w-full" required autofocus>
                @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ $task->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach

            </select>
            @error('status_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
        </div>

    </form>

    <h5>Assigned Users</h5>
    <form method="POST" action="{{route('tasks.assign', ['id' => $task->id])}}">
        @csrf
        <select id="user_ids" name="user_ids[]" class="select2-multiple form-control border-2 border-gray-600 rounded max-h-10 mb-2.5" multiple="multiple">
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $task->users->contains($user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-1.5">Save</button>
        </div>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

</script>

@endsection
