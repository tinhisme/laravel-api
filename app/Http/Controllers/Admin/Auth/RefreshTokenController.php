<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Routing\Controller;
use App\Domain\Auth\Tasks\Auth\RefreshTokenTask;

class RefreshTokenController extends Controller
{
    public function handle()
    {
        $data = resolve(RefreshTokenTask::class)->refresh();
        return $data;
    }
}
