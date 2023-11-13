<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [ 
            'name' => $this->name,
            'email' => $this->email,
            'user_id' => $this->id,
            'token' => $this->createToken($this->email)->plainTextToken,
        ];
    }
}
