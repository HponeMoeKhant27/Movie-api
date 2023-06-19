<?php

namespace Movie\Api\Comment\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'user'=> $this->user,
            'comment' => isset($this->comment) ? $this->comment : null,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->created_at->format('d-m-Y')
        ];
    }
}
