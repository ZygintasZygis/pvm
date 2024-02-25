<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class User
 * @package App\Models
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Generate unique username
     *
     * @throws Exception
     */
    public function generateUsername(): int
    {
        $username = random_int(1, 9999999);

        if ($this->find($username, 'username', )?->first()) {
            return $this->generateUsername();
        }

        return $username;
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    /**
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'user_id');
    }

    /**
     * @return array
     */
    public function getAuthUserRoles(): array
    {
        $rolesData = $this->where('username', '=', auth()->user()->username)
            ->with('roles')->first()?->toArray()['roles'] ?? [];
        return collect($rolesData)->pluck('role')->all();
    }

    /**
     * @return array
     */
    public function getUserRoles(): array
    {
        return collect($this->roles()->get()->toArray())->pluck('role', 'id')->all();
    }

    /**
     * @return array
     */
    public function getUserRolesTranslated(): array
    {
        $roles = $this->getUserRoles();
        $translated = [];

        foreach ($roles as $role) {
            $translated[$role] = trans("app.roles.$role");
        }

        return $translated;
    }

    /**
     * Get all user roles and check if he is an administrator
     *
     * @return bool
     */
    public function isUserAdministrator(): bool
    {
        if (in_array(Role::ADMINISTRATOR_ROLE, $this->getAuthUserRoles(), true)) {
            return true;
        }

        return false;
    }

    /**
     * Get all user roles and check if he is a client
     *
     * @return bool
     */
    public function isUserClient(): bool
    {
        if (in_array(Role::CLIENT_ROLE, $this->getAuthUserRoles(), true)) {
            return true;
        }

        return false;
    }

    /**
     * Get all user roles and check if he is an accountant
     *
     * @return bool
     */
    public function isUserAccountant(): bool
    {
        if (in_array(Role::ACCOUNTANT_ROLE, $this->getAuthUserRoles(), true)) {
            return true;
        }

        return false;
    }
}
