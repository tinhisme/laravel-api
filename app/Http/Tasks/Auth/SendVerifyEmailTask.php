<?php

namespace App\Http\Tasks\Auth;

use App\Models\Role;
use App\Mail\SendVerifyEmail;
use App\Jobs\SendVerifyEmailUserJob;
use App\Repositories\UserRepository;

class SendVerifyEmailTask
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($dataUser)
    {
        $url = $dataUser['role_id'] == Role::USER ? config('common.user_site_url') : config('common.seller_site_url');
        $tokenVerify = $dataUser['token_verify'];
        $urlVerify = $url . 'verify-email?token='. $tokenVerify.'&email='.$dataUser['email'];

        $verifyEmail = new SendVerifyEmail($urlVerify, $dataUser['email'], $dataUser['name']);

        SendVerifyEmailUserJob::dispatch(
            $dataUser['email'],
            $dataUser['name'],
            $verifyEmail
        );

        return [
            'messages' => 'Sending mail.'
        ];
        
    }
}
