<?php

namespace App\Services\CoreServices\ModuleAndPermission;

use App\Models\CoreModule\Module;

class ModuleSubModuleService
{
    function getModule(){
        return Module::query()->get();
    }
}
