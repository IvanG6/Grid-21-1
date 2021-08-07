<nav class="bg-indigo-600 border-b border-indigo-300 border-opacity-25 lg:border-none">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="relative h-16 flex items-center justify-between lg:border-b lg:border-indigo-400 lg:border-opacity-25">
            <div class="px-2 flex items-center lg:px-0">
                <div class="flex-shrink-0 text-2xl font-black text-white">
                    {{ config('app.name') }}
                </div>
                <div class="lg:ml-10">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-indigo-700 text-white", Default: "text-white hover:bg-indigo-500 hover:bg-opacity-75" -->
                        <a href="{{ route('home') }}" class="@if(in_array(Route::currentRouteName(), ['home'])) bg-indigo-700 text-white rounded-md py-2 px-3 text-sm font-medium @else text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md py-2 px-3 text-sm font-medium @endif">
                            Home
                        </a>

                        <a href="{{ route('departments.index') }}" class="@if(in_array(Route::currentRouteName(), ['departments.index', 'departments.edit', 'departments.create'])) bg-indigo-700 text-white rounded-md py-2 px-3 text-sm font-medium @else text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md py-2 px-3 text-sm font-medium @endif">
                            Departments
                        </a>

                        <a href="{{ route('employees.index') }}" class="@if(in_array(Route::currentRouteName(), ['employees.index', 'employees.edit', 'employees.create'])) bg-indigo-700 text-white rounded-md py-2 px-3 text-sm font-medium @else text-white hover:bg-indigo-500 hover:bg-opacity-75 rounded-md py-2 px-3 text-sm font-medium @endif">
                            Employees
                        </a>
                    </div>
                </div>
            </div>

            <div class="">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-bold text-md text-white" type="submit">LogOut</button>
                </form>
            </div>
        </div>
    </div>
</nav>