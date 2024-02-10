<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>@yield('title', 'Task Manager')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 h-screen flex flex-col">
@include('layouts.header')
<div class="flex-grow">
    <div class="container min-h-full min-w-full px-4 mt-8 flex justify-center">
        <!-- Main Content -->
        @yield('content')
    </div>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#userDropdownButton').click(function() {
            $('#userDropdown').toggleClass('hidden');
        });

        $(document).click(function(event) {
            if (!$(event.target).closest('#userDropdownButton').length && !$(event.target).closest('#userDropdown').length) {
                $('#userDropdown').addClass('hidden');
            }
        });
    });
</script>
</body>
</html>
