@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="mb-20 mt-20">
    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @method('PUT')
        @csrf
        <div class="pt-8">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Name
                    </label>
                    <div class="mt-1">
                        <input value="{{ old('name') ?? $employee->name }}" type="text" placeholder="name" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="surname" class="block text-sm font-medium text-gray-700">
                        Surname
                    </label>
                    <div class="mt-1">
                        <input value="{{ old('surname') ?? $employee->surname }}" placeholder="surname" type="text" name="surname" id="surname" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="patronymic" class="block text-sm font-medium text-gray-700">
                        Patronymic
                    </label>
                    <div class="mt-1">
                        <input value="{{ old('patronymic') ?? $employee->patronymic }}" type="text" name="patronymic" id="patronymic" autocomplete="off" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="gender" class="block text-sm font-medium text-gray-700">
                        Gender
                    </label>
                    <div class="mt-1">
                        <select id="gender" name="gender" autocomplete="off" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option selected disabled>Select gender</option>
                            <option @if((old('gender') ?? $employee->gender) == 'male' ) selected @endif value="male">Male</option>
                            <option @if((old('gender') ?? $employee->gender) == 'female' ) selected @endif value="female">Female</option>
                            <option @if((old('gender') ?? $employee->gender) == 'other' ) selected @endif value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="salary" class="block text-sm font-medium text-gray-700">
                        Salary
                    </label>
                    <div class="mt-1">
                        <input value="{{ old('salary') ?? $employee->salary }}" placeholder="salary" type="number" name="salary" id="salary" autocomplete="off" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div>
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">
                            Select Departments
                        </legend>
                        <div class="mt-4 space-y-4">
                            @foreach ($departments as $department)
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input @if(is_array(old('department') ?? $employee_departments_ids) && in_array($department->id, old('department') ?? $employee_departments_ids)) checked @endif id="department-{{ $department->id }}" name="department[]" value="{{ $department->id }}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="department-{{ $department->id }}" class="font-medium text-gray-700">{{ $department->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>

            </div>

            <div class="pt-5">
                <div class="flex justify-center items-center px-32">
                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection