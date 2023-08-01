<?php

namespace App\Http\Tasks\Auth;

use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\UserRepository;
use App\Exceptions\AuthenticateException;

class LoginTask
{
    /**
     * @var UserRepository $userRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function handle($request, $roleId)
    {
        $credentials = request(['email', 'password']);

        $user = $this->userRepository
            ->where([
                'role_id' => $roleId,
                'isValid' => true,
                'email' => $credentials['email']
            ])
            ->first();
    
        if (!$user) {
            throw AuthenticateException::invalidCredentials();
        }
            
        $token = $this->handleLogin($credentials);

        $userInfo = [
            'role_id' => $user->getAttribute('role_id'),
            'email' => $user->getAttribute('email'),
            'name' => $user->getAttribute('name'),
        ];
     
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'user' => $userInfo
        ]);
    }

        /**
     * @param array $credentials
     * @return string
     */
    protected function handleLogin($credentials)
    {
        $token = auth()->attempt($credentials);
        if (!$token) {
            return '';
        }
        return $token;
    }
}
