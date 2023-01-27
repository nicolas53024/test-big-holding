<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class MainController extends Controller
{
 
    public function __construct(
        private UserService $service
    ) {
    }
    
    public function index(Request $request) {

        $users=$this->service->getUsers();
        return view('index',[
            'users'=>$users[$request->page??0],
            'pages'=>count($users),
            'currentPage'=>$request->page??0
        ]);
    }

    public function getTransactions(string $client_id)
    {
        return view('transactions',[
            'transactions'=>$this->service->getTransactions($client_id),
        ]);
    }
}
