<?php

namespace App\Models\CoreModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    function sub_module(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubModule::class);
    }

    public function permission(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Permission::class);
    }


}
