<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{

    public function __construct(
        private UserService $service
    ) {
    }
    
    public function getUserDetails(Request $request)
    {
       return $this->service->getUser($request->user_id);
    }
}
