<?php

namespace Movie\Api\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Movie\Api\Auth\Services\LoginService;
use Movie\Api\Auth\Validators\AuthValidator;

class LoginController extends Controller
{

    /**
     * @var AuthValidator
     */
    protected $authValidator;

    /**
     * @var loginService
     */
    protected $loginService;

    /**
     * Login constructor
     *
     * @param LoginService
     */
    public function __construct(LoginService $loginService, AuthValidator $authValidator)
    {
        $this->loginService = $loginService;
        $this->authValidator = $authValidator;
    }

    /**
     * User login API method
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $result = $this->authValidator->isValid($request);
        
        if ($result->fails()) {
            return errorMessage('Validation Error.', $result->errors(), 400);
        }

        $params = $request->only('email', 'password');

        return $this->loginService->createToken($params);
    }
}
