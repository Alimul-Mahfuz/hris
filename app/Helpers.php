<?php

use App\Models\CoreModule\Module;

function getModule(): \Illuminate\Database\Eloquent\Collection
{
    return Module::with('sub_module')->get();
}

function can($can): bool|\Illuminate\Http\RedirectResponse
{
    if (auth('web')->check()) {
        if (!isset(auth('web')->user()->role->permission)) {
            return false;
        }
        foreach (auth('web')->user()->role->permission as $permission) {
            if ($permission->key == $can) {
                return true;
            }
        }
        return false;
    }
    return back();
}

function folderMapping(): array
{
    return [
        'user'=>'app/users',
    ];
}

/**
 * Return the active class for styling for module if it's submodule is active
 *
 * @param Module $module
 * @param string $currentRouteName
 * @return string
 */
function get_sub_module(Module $module, string $currentRouteName): string
{
    $submodules = $module->sub_module()->pluck('route')->toArray();
    if (in_array($currentRouteName, $submodules)) {
        return 'active';
    } else {
        return '';
    }
}

function get_active_module(Module $module, $currentRouteName): string
{
    $submodules = $module->sub_module()->pluck('route')->toArray();
    if (in_array($currentRouteName, $submodules)) {
        return 'menu-open';
    } else {
        return '';
    }
}
