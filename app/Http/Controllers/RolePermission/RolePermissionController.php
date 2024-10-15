<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\CoreModule\Module;
use App\Models\CoreModule\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    function index(){
        return view('modules.roles_permissions.index');
    }

    function create(){
        $modules = Module::query()->orderBy("position", "asc")->select("id", "name", "key")->with("permission")->get();
         return view('modules.roles_permissions.modals.create',compact('modules'));
    }
}
