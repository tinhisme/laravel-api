<?php

namespace App\Domain\Auth\Tasks\Auth;

class RefreshTokenTask
{
    public function refresh()
    {
        $newToken = auth()->refresh();
        return $this->respondWithToken($newToken);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
