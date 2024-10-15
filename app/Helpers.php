<?php

use App\Models\CoreModule\Module;

function getModule(): \Illuminate\Database\Eloquent\Collection
{
    return Module::with('sub_module')->get();
}


function folderMapping(): array
{
    return [
        'user'=>'app/users',
    ];
}
