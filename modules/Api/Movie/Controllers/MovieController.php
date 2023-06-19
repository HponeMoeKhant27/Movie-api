<?php

namespace Movie\Api\Movie\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Movie\Api\Movie\Resources\MovieResource;
use Movie\Api\Movie\Services\MovieService;
use Movie\Api\Movie\Validators\MovieValidator;

class MovieController extends Controller
{

    /**
     * @var movieService
     */
    protected $movieService;

    /**
     * @var MovieValidator
     */
    protected $movieValidator;

    /**
     * @var array
     */
    const ATTRIBUTES = [
        'title',
        'summary',
        'generes',
        'author',
        'tags',
        'imdb_rate',
    ];

    /**
     * Movie constructor
     *
     * @param MovieService
     */
    public function __construct(MovieService $movieService, MovieValidator $movieValidator)
    {
        $this->movieService = $movieService;
        $this->movieValidator = $movieValidator;
    }


    /**
     * Retrieve a list of movies.
     *
     * Routing: /movies
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $inputs = $request->only('limit', 'offset');

        $validator = Validator::make($inputs, [
            'limit' => 'integer',
            'offset' => 'integer',
        ]);

        if ($validator->fails()) {
            return errorMessage('Validation Error.', $validator->errors(), 400);
        }

        $inputs = $this->movieService->setDefaultLimitOffset($inputs);
        $movies = $this->movieService->getMovies($inputs);

        return responseMessage(MovieResource::collection($movies), 200, $inputs['limit'], $inputs['offset']);
    }

    /**
     * Create movie
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = array_filter($request->only(self::ATTRIBUTES), function ($v) {
            return $v !== null;
        });

        $validator = $this->movieValidator->isValid($inputs);

        if ($validator->fails()) {
            return errorMessage('Validation Error.', $validator->errors(), 400);
        }

        $created = $this->movieService->create($inputs);

        return responseMessage(new MovieResource($created), 201);
    }

    /**
     * Show movie
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        $movie = $this->movieService->show($id);

        if (is_null($movie)) {
            $message = new MessageBag();
            $message->add('Not Found', 'The resource of the given ID was not found.');
            return errorMessage('Not Found', $message, 404);
        }

        return responseMessage(new MovieResource($movie), 200);
    }

    /**
     * Update movie
     *
     * @param int $id
     * @param Request $request
     */
    public function update(int $id, Request $request)
    {
        $movie = $this->movieService->show($id);

        if (is_null($movie)) {
            $message = new MessageBag();
            $message->add('Not Found', 'The updating resource of the given ID was not found.');
            return errorMessage('Not Found', $message, 404);
        }

        $inputs = array_filter($request->only(self::ATTRIBUTES), function ($v) {
            return $v !== null;
        });

        $validator = Validator::make($inputs, [
            'title'    => 'max:30|min:0',
            'summary' => 'max:225|min:0',
        ]);

        if ($validator->fails()) {
            return errorMessage('Validation Error.', $validator->errors(), 400);
        }

        $movie->fill($inputs);
        $updated = $this->movieService->update($movie);

        return ($updated === true) ? responseMessage(new MovieResource($movie), 200) : $updated;
    }

    /**
     * Delete movie
     *
     * @param $id
     */
    public function destroy(int $id)
    {
        $movie = $this->movieService->show($id);

        if (is_null($movie)) {
            $message = new MessageBag();
            $message->add('Not Found ', 'The deleting resource of the given ID was not found.');
            return errorMessage('Not Found', $message, 404);
        }

        $this->movieService->delete($movie);

        return responseMessage(['deleted' => 1], 200);
    }

    /**
     * Upload Image
     *
     * @param int $id
     */
    public function uploadImage(int $id, Request $request)
    {

        $movie = $this->movieService->show($id);

        if (is_null($movie)) {
            $message = new MessageBag();
            $message->add('Not Found ', 'The updating resource of the given ID was not found.');
            return errorMessage('Not Found', $message, 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return errorMessage('Validation Error.', $validator->errors(), 400);
        }
        $image = $request->file('image');

        $this->movieService->upload($id, $movie, $image);

        return responseMessage(['uploaded' => 1], 201);
    }
}
