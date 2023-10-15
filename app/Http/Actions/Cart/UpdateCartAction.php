<?php

namespace App\Http\Actions\Cart;

use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Cart\UpdateCartTask;

class UpdateCartAction extends BaseAction
{

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->request->all();
        return resolve(UpdateCartTask::class)->handle($data);
    }
}
