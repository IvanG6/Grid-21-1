<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show home page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $departments = Department::get();
        $employees = Employee::with('departments:id')->orderBy('name', 'desc')->paginate(10);
        return view('home', ['departments' => $departments, 'employees' => $employees]);
    }
}
