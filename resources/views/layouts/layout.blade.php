<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>@yield('title', 'Task Manager')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
@include('layouts.header')
<div class="flex-grow">
    <div class="container mx-auto px-4 mt-8">
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
