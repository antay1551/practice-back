<?php

namespace App\Http\Resources\User;

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
            'attributes' => [
                'id' => $this->id,
                'firstName' => $this->first_name,
                'lastName' => $this->last_name,
                'email' => $this->email,
            ],
        ];

        $response['relationships']['role'] = [
            'type' => 'role',
            'attributes' => [
                'role' => $this->role->name ? $this->role->name : null,
            ]
        ];

        return $response;
    }
}
