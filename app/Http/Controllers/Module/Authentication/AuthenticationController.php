<?php

namespace App\Http\Controllers\Module\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function index(){
        return view('modules.authentication.index');
    }

    function authenticate(Request $request){
        $request->validate([
            'employee_id'=>'required|exists:users,employee_id',
            'password'=>'required'
        ]);






    }
}
