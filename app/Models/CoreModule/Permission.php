<?php

namespace App\Models\CoreModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    function role(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Role::class,'permission_role');
    }
}
