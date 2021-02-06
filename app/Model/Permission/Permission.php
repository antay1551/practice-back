<?php

namespace App\Model\Permission;

use App\Model\Role\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Model\Permission\Permission
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Permission\Permission query()
 * @mixin \Eloquent
 */
class Permission extends Model
{
    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
