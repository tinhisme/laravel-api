<?php

namespace App\Http\Actions\User\Auth;

use Carbon\Carbon;
use App\Repositories\UserRepository;
use App\Http\Shared\Actions\BaseAction;
use App\Exceptions\AuthenticateException;

class UserVerifyEmailAction extends BaseAction
{
    /**
     * @var UserRepository $userRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * handle
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function handle()
    {
        $tokenVerify = $this->request['token'];
        $email = $this->request['email'];
    
        $dataUser = $this->userRepository->where([
            'token_verify' => $tokenVerify,
            'email' => $email
        ])->get()->toArray();
    
        if (!$dataUser) {
            throw AuthenticateException::invalidToken();
        }
    
        $dataUser = array_map(function ($dataPattern) {
            $dataPattern['token_verify'] = null;
            $dataPattern['email_verified_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $dataPattern['password'] = "";
            $dataPattern['isValid'] = true;
            return $dataPattern;
        }, $dataUser);

        $dataUpdate = ['token_verify', 'email_verified_at', 'isValid'];
        $result = $this->userRepository->upsert($dataUser, false, ['id'], $dataUpdate);
        
        if($result){
            return response()->json([
                'message' => 'verify email user succesfully',
            ]); 
        }
    }
}
