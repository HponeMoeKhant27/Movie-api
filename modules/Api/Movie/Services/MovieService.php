<?php

namespace Movie\Api\Movie\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Movie\Api\Movie\Models\Movie;

class MovieService
{
    /**
     * @var Movie
     */
    protected $movie;

    /**
     * @var limit
     */
    protected int $limit = 30;

    /**
     * @var offset
     */
    protected int $offset = 0;


    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * Retrieve get all movies
     *
     * @param array $inputs
     */
    public function getMovies(array $inputs = []): Collection
    {
        $movies = $this->movie->skip($inputs['offset'])->take($inputs['limit'])->orderBy('created_at', 'DESC')->get();
        return $movies;
    }

    /**
     * Create movie
     *
     * @param array $inputs
     */
    public function create(array $inputs = [])
    {
        try {
            return  $this->movie->create($inputs);
        } catch (\Exception $e) {
            $message = new MessageBag();
            $message->add('DBErrorException', 'Creating Failed');
            return errorMessage('Database', $message, 400);
        }
    }

    /**
     * Show movie by movie id
     *
     * @param int $id
     */
    public function show(int $id)
    {
        $movie = $this->movie->find($id);
        return $movie;
    }

    /**
     * update movie by movie id
     *
     * @param Movie
     */
    public function update(Movie $movie)
    {
        try {
            return $movie->update();
        } catch (\Exception $e) {
            $message = new MessageBag();
            $message->add('DBErrorException', 'Updating failed');
            return errorMessage('UpdateDBErrorException', $message, 400);
        }
    }

    /**
     * delete movie by movie id
     *
     * @param Movie
     */
    public function delete(Movie $movie)
    {
        return $movie->delete();
    }

    /**
     * set Default limit and offset
     *
     * @param array $input
     * @return array
     */
    public function setDefaultLimitOffset(array $inputs): array
    {
        return [
            'limit' => isset($inputs['limit']) ? (int)$inputs['limit'] : $this->limit,
            'offset' => isset($inputs['offset']) ? (int)$inputs['offset'] : $this->offset
        ];
    }

    /**
     * upload image
     *
     * @param int $id
     * @param Movie $movie
     */
    public function upload(int $id, Movie $movie, $image)
    {
        $uploadFolder = 'movies';
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        $uploadedImageResponse = array(
            "image_name" => basename($image_uploaded_path),
            "image_url" => Storage::disk('public')->url($image_uploaded_path),
            "mime" => $image->getClientMimeType()
        );

        $movie->image_path = $uploadedImageResponse['image_url'];
        $movie->save();

        return $movie;
    }
}
