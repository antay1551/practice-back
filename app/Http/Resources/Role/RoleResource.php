<?php

namespace App\Http\Resources\Role;

use App\Http\Resources\Permission\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoleResource
 * @package App\Http\Resources\Role
 */
class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'type' => 'role',
            'attributes' => [
                'name' => $this->name,
            ],
            'relationships' => [
                'role' => PermissionResource::collection($this->whenLoaded('permissions'))
            ]
        ];
    }
}
