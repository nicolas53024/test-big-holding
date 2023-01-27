<?php

namespace App\Utils;

enum WebServices:string
{

    case GETUSERS = '/users';
    case GETTRANSACTIONS = '/transaction';
}