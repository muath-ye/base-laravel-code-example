<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->first_name . ' ' . $this->last_name,
            'title' => $this->title,
            'age' => $this->when(
                        $request->has('show-age'),
                        $this->birthdate->diffInYears()
                     ),
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('X-RateLimit-UserLimit', $this->limit);
    }
}
