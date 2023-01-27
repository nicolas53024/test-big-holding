<?php
namespace App\Services;

use App\Utils\CustomRequest;
use App\Utils\WebServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct(
        private CustomRequest $request,
        protected string $baseUrl="",
        protected string $token=""
    ) {
        $this->baseUrl=config('services.api.baseUrl');
        $this->token=config('services.api.token');

    }

    public function getUsers()
    {
        
        $collection=$this->request->get($this->baseUrl.WebServices::GETUSERS->value."/$this->token");
        $response=$collection->take(50)->sortByDesc(function ($obj) {
            return Carbon::parse($obj["created_at"])->getTimestamp();
        });
        return $response->values()->chunk(10);
    }

    public function getTransactions(string $clientId)
    {
       $collection=$this->request->get($this->baseUrl.WebServices::GETUSERS->value."/$this->token".WebServices::GETTRANSACTIONS->value."/$clientId");
       $response=$collection->take(50)->sortByDesc(function ($obj) {
           return Carbon::parse($obj["created_at"])->getTimestamp();
       });
       return $response->values();
    }

    public function getUser(string $id)
    {
        $collection=$this->request->get($this->baseUrl.WebServices::GETUSERS->value."/$this->token");
        $user=$collection->first(fn($x) => $x['user_id'] == $id);
        $user['transactions']=$this->getTransactions($user['user_id']);
        Log::info(json_encode($user));
        return $user;
    }
}