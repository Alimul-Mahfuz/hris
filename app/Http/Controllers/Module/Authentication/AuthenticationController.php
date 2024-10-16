<?php

namespace App\Http\Controllers\Module\Authentication;

use App\Http\Controllers\Controller;
use App\Models\UserModule\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function index()
    {
        return view('modules.authentication.index');
    }


    function super_admin_login()
    {
        return view('modules.authentication.super_admin.index');
    }

    function authenticate(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,employee_id',
            'password' => 'required'
        ]);
        $isActive = User::query()->where('employee_id', $request->input('employee_id'))->where('is_active', true)->first();
        if (!$isActive) {
            return redirect()->back()->with('error', 'Employee Id is not active');
        }

    }

    public function super_admin_authenticate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|exists:super_admins,email',
            'password' => 'required'
        ]);


        if (Auth::guard('s_admin')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {

            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    function logout(): \Illuminate\Http\RedirectResponse
    {
        if (auth()->guard('s_admin')->check()) {
            Auth::guard('s_admin')->logout();
        } else {
            auth()->guard('web')->logout();
        }
        session()->regenerate();
        session()->flush();
        return redirect()->route('login');
    }

}
