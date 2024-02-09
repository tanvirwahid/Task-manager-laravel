<nav class="bg-gray-800 py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <!-- Left side of header -->
        <div>
            <a class="text-white text-lg font-semibold">Tasks</a>
            <a href="{{route('users.index')}}" class="text-white text-lg font-semibold m-6">Team</a>
            <a href="{{route('projects.index')}}" class="text-white text-lg font-semibold m-2">Projects</a>
        </div>
        <!-- Right side of header -->
        <div class="relative" >
            <button id="userDropdownButton" class="text-white mr-4 cursor-pointer focus:outline-none">{{Auth::user()->name}}</button>
            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-10">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 w-full text-left">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
