<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'post_id' => $this->id,
            'post_title' => $this->title,
            'post_description' => $this->description,
            'post_created_at' => $this->created_at->toDateString(),
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
        ];
    }
}
