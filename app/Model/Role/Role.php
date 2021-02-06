<?php

namespace App\Model\Role;

use App\Model\Permission\Permission;
use App\Model\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Model\Role\Role
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role\Role query()
 * @mixin \Eloquent
 */
class Role extends Model
{
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
