<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\CoreModule\Module;
use App\Services\CoreServices\RolesAndPermissions\RoleAndPermissionService;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    protected RoleAndPermissionService $role_permission_service ;

    /**
     * @param RoleAndPermissionService $role_permission_service
     */
    public function __construct(RoleAndPermissionService $role_permission_service)
    {
        $this->role_permission_service = $role_permission_service;
    }

    function index(){
        return view('modules.roles_permissions.index');
    }

    function create(){
        $modules = Module::query()->orderBy("position", "asc")->select("id", "name", "key")->with("permission")->get();
         return view('modules.roles_permissions.modals.create',compact('modules'));
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required',
            'is_active' => 'required',
        ]);
    }
}
