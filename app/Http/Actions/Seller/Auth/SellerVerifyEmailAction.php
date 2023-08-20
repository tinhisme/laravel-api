<?php

namespace App\Http\Actions\Seller\Auth;

use Carbon\Carbon;
use App\Models\Seller;
use App\Helpers\Common;
use App\Repositories\UserRepository;
use App\Domain\Seller\Tasks\RegisterTask;
use App\Http\Shared\Actions\BaseAction;
use App\Exceptions\AuthenticateException;

class SellerVerifyEmailAction extends BaseAction
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
    
        $dataSeller = $this->userRepository->where([
            'token_verify' => $tokenVerify,
            'email' => $email
        ])->get()->toArray();
    
        if (!$dataSeller) {
            throw AuthenticateException::invalidToken();
        }
    
        $dataSeller = array_map(function ($dataPattern) {
            $dataPattern['token_verify'] = null;
            $dataPattern['email_verified_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $dataPattern['password'] = "";
            $dataPattern['isValid'] = true;
            return $dataPattern;
        }, $dataSeller);

        $dataUpdate = ['token_verify', 'email_verified_at', 'isValid'];
        $result = $this->userRepository->upsert($dataSeller, false, ['id'], $dataUpdate);
        
        if($result){
            return response()->json([
                'message' => 'verify email user succesfully',
            ]); 
        }
    }
}
