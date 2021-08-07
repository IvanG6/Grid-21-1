<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Resources\EmployeeCollection;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        $employeeCollection = new EmployeeCollection($employees);
        return view('employees.index', ['employees' => $employeeCollection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select('id', 'name')->get();
        return view('employees.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->patronymic = $request->patronymic;
        $employee->gender = $request->gender;
        $employee->salary = $request->salary;
        $employee->save();
        $employee->departments()->attach($request->department);
        return back()->withErrors([
            'message_success' => 'Employee has been successfuly created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::select('id', 'name')->get();
        $employee_departments = $employee->departments;
        $employee_departments_ids =  $employee_departments->pluck('id')->toArray();
        return view('employees.edit', ['employee' => $employee, 'departments' => $departments, 'employee_departments_ids' => $employee_departments_ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateEmployeeRequest  $request
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEmployeeRequest $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->patronymic = $request->patronymic;
        $employee->gender = $request->gender;
        $employee->salary = $request->salary;
        $employee->save();
        $employee->departments()->sync($request->department);
        return back()->withErrors([
            'message_success' => 'Employee has been successfuly updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->withErrors([
            'message_success' => 'Employee has been successfuly deleted',
        ]);
    }
}
