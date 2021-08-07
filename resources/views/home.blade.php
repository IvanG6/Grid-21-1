@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-100 rounded-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-gray-200 border">
                            </th>
                            @foreach ($departments as $department)
                            <th scope="col" class="px-6 py-3 w-64 text-left whitespace-nowrap text-xs font-medium text-gray-500 uppercase tracking-wider border-gray-200 border">
                                <a href="{{ route('departments.edit', $department->id) }}">{{ $department->name }}</a>
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr class="bg-white">
                            <th scope="col" class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-gray-200 border">
                                <a href="{{ route('employees.edit', $employee->id) }}">{{ $employee->name }}</a>
                            </th>
                            @foreach ($departments as $department)
                            <th scope="col" class="px-6 py-3 w-64 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-gray-200 border">
                                @if (in_array($department->id, $employee->departments->pluck('id')->toArray()))
                                <div class="inline-flex justify-center items-center w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </div>
                                @endif
                            </th>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $employees->onEachSide(1)->links() }}
    </div>
</div>

@endsection