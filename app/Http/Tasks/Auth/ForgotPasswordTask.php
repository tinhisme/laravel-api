<?php

namespace App\Http\Tasks\Auth;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Jobs\SendResetPasswordJob;
use App\Mail\SendResetPasswordEmail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Exceptions\AuthenticateException;
use Illuminate\Validation\ValidationException;

class ForgotPasswordTask
{
    /**
     * @param \App\Models\User $user
     * @param \Illuminate\Support\Collection $request
     * @return array|mixed|string[]
     * @throws ValidationException
     * @throws \App\Exceptions\BaseException
     */
    public function handle($user, $request)
    {
        $roleName = $user->getRelationValue('role')->name;
        $url = $roleName == Role::ROLE_USER ? config('common.user_site_url') : config('common.seller_site_url');
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->getAttribute('email'),
        ], [
            'token' => Str::random(60),
        ]);
        
        $encryptEmail = Crypt::encryptString($user->getAttribute('email'));
        
        $redirectUrl = $url. '?email=' . $encryptEmail . '&token=' . $passwordReset->token;
        dd($redirectUrl);
        $expiredTime = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->addHours(24)->format('Y/m/d H:i:s');
        
        $response = $this->sendResetLink($user->getAttribute('email'), $user->getAttribute('name'), $redirectUrl, $expiredTime);

        if ($response) {
            return $this->sendResetLinkResponse(__('success.auth.send_email_success'));
        }

        return $this->sendResetLinkFailedResponse($response);
    }

    /**
     * @param string $email
     * @param string $name
     * @param string $redirectUrl
     * @param string $expiredTime
     * @return bool
     */
    protected function sendResetLink($email, $name, $redirectUrl, $expiredTime)
    {
        try {
            $sendResetPassowrd = new SendResetPasswordEmail($email, $name, $redirectUrl, $expiredTime);
            
            SendResetPasswordJob::dispatch(
                $email,
                $name,
                $redirectUrl,
                $expiredTime, 
                $sendResetPassowrd
            );

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param string $response
     * @return array
     */
    protected function sendResetLinkResponse($response)
    {
        return ['message' => $response];
    }

    /**
     * @param boolean $response
     * @return mixed
     * @throws ValidationException
     */
    protected function sendResetLinkFailedResponse($response)
    {
        throw ValidationException::withMessages([
            'email' => [Lang::get('passwords.forgot.error_sending')],
        ]);
    }
}
