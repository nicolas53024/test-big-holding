<?php

namespace App\Utils;

interface IRequest
{
    public function get(string $url="/", string $query="");
    public function post($url, $params);
}
