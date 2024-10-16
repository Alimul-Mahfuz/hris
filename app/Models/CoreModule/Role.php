<?php

namespace App\Models\CoreModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $name
 * @property mixed|true $is_active
 */
class Role extends Model
{
    use HasFactory;

    function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'permission_role');
    }


}
