<?php

namespace App\Http\Tasks\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\AuthenticateException;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class ChangePasswordTask
{
    /**
     * @param \App\Models\User $user
     * @param \Illuminate\Support\Collection $request
     * @return array|mixed|string[]
     * @throws ValidationException
     * @throws \App\Exceptions\BaseException
     */
    public function handle($request)
    {
        $data = $request->all();
        $account = Auth::user();

        if (!Hash::check($data['current_password'], $account->password)) {
            throw AuthenticateException::updatePasswordFail();
        }

        $account->password = Hash::make($data['password']);
        $account->updated_at = Carbon::now();

        $account->save();
        return [
            'message' => Lang::get('success.auth.change_password_success'),
            'data' => $account
        ];
    }


}
