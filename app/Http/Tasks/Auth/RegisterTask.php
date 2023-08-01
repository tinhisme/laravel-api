<?php

namespace App\Http\Tasks\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\AuthenticateException;
use App\Http\Tasks\Auth\SendVerifyEmailTask;

class RegisterTask
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

        
        $dataUser = request(['name', 'email']);
        $dataUser['password'] = Hash::make($request['password']);
        $dataUser['role_id'] = $roleId;
        $dataUser['token_verify'] = Str::random(40);

        DB::beginTransaction();
        DB::enableQueryLog();

        $userId = $this->userRepository->insertGetId($dataUser, false);
        
        if(!$userId){
            return 'errror';
        }
        
        $user = $this->userRepository->findByField('id', $userId)->first();

        // logic send email verify user after register account
        resolve(SendVerifyEmailTask::class)->handle($dataUser);
        
        DB::commit();
        return response()->json([
            'success' => true,
            'message' => 'user registration successfully',
            'user' => $user
        ], 201);
    }   
}
