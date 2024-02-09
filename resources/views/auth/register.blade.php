<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="max-w-md w-full bg-white p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Register</h2>
    <form method="POST" action="#">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2" >Full Name</label>
            <input id="name" type="text" name="name" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="employee_id" class="block text-sm font-bold mb-2">Employee Id</label>
            <input id="employee_id" type="text" name="employee_id" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ old('employee_id') }}" required autofocus>
            @error('employee_id')
                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-bold mb-2">Email Address</label>
            <input id="email" type="email" name="email" class="border-2 border-gray-600 rounded-lg p-2 w-full" value="{{ old('email') }}" required autofocus>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-bold mb-2">Password</label>
            <input id="password" type="password" name="password" class="border-2 border-gray-600 rounded-lg p-2 w-full" required autofocus>
            @error('password')
                 <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-bold mb-2">Comfirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="border-2 border-gray-600 rounded-lg p-2 w-full" required>
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Login</button>
        </div>

    </form>

    <div>
        <p class="text-sm text-gray-600">Already have an account? <a href="{{route('login')}}" class="text-blue-500 hover:text-blue-600">Login</a></p>
    </div>

</div>
</body>
</html>
