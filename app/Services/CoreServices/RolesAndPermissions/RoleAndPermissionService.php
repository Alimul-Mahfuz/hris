<?php

namespace App\Services\CoreServices\RolesAndPermissions;

use App\Models\CoreModule\Module;
use App\Models\CoreModule\Role;

class RoleAndPermissionService
{
    public function getRoleById($id)
    {
        return Role::query()->where("id", $id)->first();
    }

    public function getModule(): \Illuminate\Database\Eloquent\Collection
    {
        return Module::query()->orderBy("position", "asc")->select("id", "name", "key")->with("permission")->get();
    }

    public function createRole($request): bool
    {
        $role = new Role();
        $role->name = $request->name;
        $role->is_active = true;
        if ($role->save()) {
            $permission = $request['permission'];
            $this->handlePermissionRelationship($role, $permission);
            return true;
        }
        return false;
    }

    public function updateRole($request, $id): bool
    {
        $role = Role::query()->find($id);
        $role->name = $request->name;
        $role->is_active = $request->is_active;
        if ($role->save()) {
            $permission = $request['permission'];
            $this->handlePermissionRelationship($role, $permission);
            return true;
        }
        return false;
    }

    private function handlePermissionRelationship($role, $permission): void
    {
        $role->permission()->sync($permission);
    }
}
