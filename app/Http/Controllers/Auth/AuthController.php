<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * User login
     *
     * @param  LoginFormRequest             $request
     * @return Illuminate\Http\JsonResponse
     */
    public function login(LoginFormRequest $request)
    {
        try {
            if (!($token = $this->auth->attempt($request->only('email', 'password')))) {
                return response()->json([
                    'errors' => [
                        'login' => 'Invalid email or password!'
                    ]
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'errors' => [
                    'login' => 'Oops! failed to authorize.'
                ]
            ], $e->getStatusCode());
        }

        return response()->json([
            'data' => $request->user(),
            'meta' => [
                'token' => $token
            ]
        ], 201);
    }

    /**
     * User Register
     *
     * @param  RegisterFormRequest          $request
     * @return Illuminate\Http\JsonResponse
     */
    public function register(RegisterFormRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $this->auth->attempt($request->only('email', 'password'));

        return response()->json([
            'data' => $user,
            'meta' => [
                'token' => $token
            ]
        ], 201);
    }

    /**
     * Logout user.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->auth->invalidate($this->auth->getToken());

        return response()->json(null, 201);
    }

    /**
     * Login user data.
     *
     * @param Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
        return response()->json([
            'data' => $request->user(),
        ], 200);
    }
}
