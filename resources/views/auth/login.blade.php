<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="max-w-md w-full bg-white p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Login</h2>
    <form method="POST" action="#">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-bold mb-2">Email Address</label>
            <input id="email" type="email" name="email" class="rounded-lg p-2 w-full" required autofocus>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-bold mb-2">Password</label>
            <input id="password" type="password" name="password" class="rounded-lg p-2 w-full" required>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Login</button>
        </div>
        <div>
            <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-blue-500 hover:text-blue-600">Register</a></p>
        </div>
    </form>
</div>
</body>
</html>
