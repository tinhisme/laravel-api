<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\Http\Requests\Auth\GetMeRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class GetMeController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param GetMeRequest $request
     * @return mixed
     */
    public function __invoke(GetMeRequest $request)
    {
        $user = $this->userRepository->find(Auth::id())->first();
        $userInfo = [
            'name' => $user->getAttribute('name'),
            'role' => $user->getRelationValue('role'),
            'email' => $user->getAttribute('email'),
        ];
        return $userInfo;
    }
}
