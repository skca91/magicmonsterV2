<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


/**
* @OA\Info(title="API Magic Monster", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/

class AuthController extends Controller
{
    /**
    * @OA\Post(
    *     path="/api/auth/signup",
    *     summary="Register new users",
    *     tags={"sign up"},

     *   @OA\Parameter(
     *      name="name",
     *      in="path",
     *      description="User name",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="path",
     *      description="User email",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="password",
     *      in="path",
     *      description="User password",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
    *     @OA\Response(
    *         response=201,
    *         description="Successfully created user"
    *     ),
    *     @OA\Response(
    *         response="404",
    *         description="Error user not created"
    *     ),
    * )
    */

    public function signUp(Request $request){

        $request->validate([
            'username' => 'required|unique:users|min:5',
            'name' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'exp' => 0
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

     /**
    * @OA\Post(
    *     path="/api/auth/login",
    *     summary="Login users",
    *     tags={"login"},

     *   @OA\Parameter(
     *      name="username",
     *      in="path",
     *      description="User name",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="password",
     *      in="path",
     *      description="User password",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
    *     @OA\Response(
    *         response=200,
    *         description="Login user"
    *     ),
    *     @OA\Response(
    *         response="401",
    *         description="Unauthorized"
    *     ),
    * )
    */

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = request(['username', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

      /**
    * @OA\Get(
    *     path="/api/auth/logout",
    *     summary="Logout user",
    *     tags={"logout"},
     * @OA\Parameter(
     *      name="token",
     *      in="path",
     *      description="token",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
    *     @OA\Response(
    *         response=200,
    *         description="Successfully logged out"
    *     ),
    * )
    */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
    * @OA\Get(
    *     path="/api/auth/user",
    *     summary="Info user",
    *     tags={"user"},
     * @OA\Parameter(
     *      name="token",
     *      in="path",
     *      description="token",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
    *     @OA\Response(
    *         response=200,
    *         description="Info user showed"
    *     ),
     *  @OA\Response(
    *         response=401,
    *         description="Unauthenticated"
    *     ),
    * )
    */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
