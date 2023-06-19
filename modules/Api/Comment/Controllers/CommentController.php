<?php

namespace Movie\Api\Comment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Movie\Api\Comment\Services\CommentService;
use Movie\Api\Comment\Resources\CommentResource;

class CommentController extends Controller
{

    /**
     * @var CommentService
     */
    protected $CommentService;

    /**
     * @var array
     */
    const ATTRIBUTES = [
        'email',
        'user',
        'movie_id',
        'comment'
    ];

    /**
     * Comment constructor
     *
     * @param CommentService
     */
    public function __construct(CommentService $CommentService)
    {
        $this->CommentService = $CommentService;
    }

    /**
     * Create Comment
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $inputs = array_filter($request->only(self::ATTRIBUTES), function ($v) {
            return $v !== null;
        });

        $validator = Validator::make($inputs, [
            'email'    => 'required|email',
            'movie_id'  => 'required|integer',
            'comment' => 'required|max:225|min:0',
        ]);

        if ($validator->fails()) {
            return errorMessage('Validation Error.', $validator->errors(), 400);
        }

        $created = $this->CommentService->create($inputs);

        return responseMessage(new CommentResource($created), 201);
    }

    /**
     * Update Comment
     *
     * @param int $id
     * @param Request $request
     */
    public function update(int $id, Request $request)
    {
        $Comment = $this->CommentService->show($id);

        if (is_null($Comment)) {
            $message = new MessageBag();
            $message->add('Not Found ', 'The updating resource of the given ID was not found.');
            return errorMessage('Not Found', $message, 404);
        }

        $inputs = array_filter($request->only(self::ATTRIBUTES), function ($v) {
            return $v !== null;
        });

        $validator = Validator::make($inputs, [
            'email'    => 'email|max:30|min:0',
            'comment' => 'max:225|min:0',
        ]);

        if ($validator->fails()) {
            return errorMessage('Validation Error.', $validator->errors(), 400);
        }
        $Comment->fill($inputs);
        $updated = $this->CommentService->update($Comment);

        return ($updated === true) ? responseMessage(new CommentResource($Comment), 200) : $updated;
    }

    /**
     * Delete Comment
     *
     * @param $id
     */
    public function destroy(int $id)
    {
        $Comment = $this->CommentService->show($id);

        if (is_null($Comment)) {
            $message = new MessageBag();
            $message->add('Not Found ', 'The deleting resource of the given ID was not found.');
            return errorMessage('Not Found', $message, 404);
        }

        $this->CommentService->delete($Comment);

        return responseMessage(['deleted' => 1], 200);
    }
}
