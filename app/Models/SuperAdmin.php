<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static findOrFail($userId)
 */
class SuperAdmin extends Authenticatable
{
    use HasFactory;
}
