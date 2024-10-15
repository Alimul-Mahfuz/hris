<?php

namespace App\Http\Controllers\EmployeeManagment\EmployeeTermination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeTerminationController extends Controller
{
    function index(){
        return view ('employee_termination.employee_termination');
    }
}
