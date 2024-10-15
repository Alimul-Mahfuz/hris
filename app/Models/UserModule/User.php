<?php

namespace App\Models\UserModule;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed $name
 * @property mixed $email
 * @property mixed $phone
 * @property mixed $designation_id
 * @property mixed $joining_date
 * @property mixed|string $password
 * @property mixed $present_address
 * @property mixed $permanent_address
 * @property mixed $father_name
 * @property mixed $mother_name
 * @property mixed $dob
 * @property mixed $nid
 * @property mixed $gender
 * @property mixed $bg
 * @property mixed|string $employee_id
 * @property mixed $employment_type
 * @property mixed $remuneration
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'joining_date',
        'termination_date',
        'is_active',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    function designation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
}
