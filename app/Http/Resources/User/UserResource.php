<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources\User
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'firstName' => $this->first_name,
                'lastName' => $this->last_name,
                'email' => $this->email,
            ],
            'relationships' => [
                'role' => new RoleResource($this->whenLoaded('role'))
            ]
        ];

        return $response;
    }
}
