<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class Role
 * @package App\Models
 * @mixin Builder
 */
class Role extends Model
{
    use HasFactory;

    public const ADMINISTRATOR_ROLE = 'administrator';
    public const CLIENT_ROLE = 'client';
    public const ACCOUNTANT_ROLE = 'accountant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
    ];

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_roles', 'role_id', 'user_id');
    }

    /**
     * @return Collection
     */
    public function allRoles(): Collection
    {
        return $this->select()->pluck('role', 'id');
    }
}
