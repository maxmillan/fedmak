<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class CustomExeption extends Exception
{
    public function report(){
        dd('BILL TENANT FIRST');
    }
}
