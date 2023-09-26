<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Routing\Controller;
use App\Http\Tasks\Auth\RefreshTokenTask;

class RefreshTokenController extends Controller
{
    public function __invoke()
    {
        $data = resolve(RefreshTokenTask::class)->handle();
        return $data;
    }
}
