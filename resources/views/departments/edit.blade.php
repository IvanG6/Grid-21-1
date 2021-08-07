@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
<div class="mb-20 mt-20">
    <form method="POST" action="{{ route('departments.update', $department->id) }}">
        @method('PUT')
        @csrf
        <label for="email" class="block text-sm font-medium text-gray-700">Update Departement Name</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <div class="relative flex items-stretch flex-grow focus-within:z-10">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <input value="{{ old('name') ?? $department->name }}" type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300" placeholder="name">
            </div>
            <button type="submit" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-indigo-300 text-sm font-medium rounded-r-md text-indigo-700 bg-indigo-50 hover:bg-indigo-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                Update
            </button>
        </div>
    </form>
</div>
@endsection