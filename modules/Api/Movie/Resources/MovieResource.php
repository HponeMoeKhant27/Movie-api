<?php

namespace Movie\Api\Movie\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $movies = [
            'id'          => $this->id,
            'title'       => $this->title,
            'summary'     => isset($this->summary) ? $this->summary : null,
            'cover_image' => isset($this->cover_image) ? $this->cover_image : null,
            'generes'     => isset($this->generes) ? $this->generes : null,
            'author'      => isset($this->author) ? $this->author : null,
            'tags'        => isset($this->tags) ? $this->tags : null,
            'imdb_rate'   => isset($this->imdb_rate) ? $this->imdb_rate : null,
            'created_at'  => $this->created_at->format('d-m-Y'),
            'updated_at'  => $this->created_at->format('d-m-Y'),
            'comments'    => [],
            'related_movie' => []
        ];


        if (!$this->resource->comments->isEmpty()) {
            $comments = $this->resource->comments;
            foreach ($comments as $comment) {
                array_push($movies['comments'], [
                    'id' => $comment->id,
                    'email' => $comment->email,
                    'user' => $comment->user,
                    'comment' => $comment->comment,
                    'created_at'  => $comment->created_at->format('d-m-Y'),
                    'updated_at'  => $comment->created_at->format('d-m-Y'),
                ]);
            }
        }
        return $movies;
    }
}
