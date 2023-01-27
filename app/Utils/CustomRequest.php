<?php

namespace App\Utils;

use App\Exceptions\InvalidTokenException;
use Illuminate\Support\Facades\Http;

class CustomRequest implements IRequest
{
    public function __construct(
        protected Http $request,
         ) {
    }
    public function get(string $url="/", string $query="")
    {   
        $res=$this->request::withOptions(['verify' => false])->get($url);
        if($res->status() == 401){
            throw new InvalidTokenException;
        }
        return $res->collect();
    }
    public function post($url, $params)
    {
        $this->request::post($url, $params);
    }
}
