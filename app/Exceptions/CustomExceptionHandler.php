<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class CustomExceptionHandler extends ExceptionHandler
{
    public function register()
    {
        $this->renderable(function(Throwable $e){
            if ($e instanceof ServiceUserMissing)
                return view('exceptions.platform-error');
        });
    }
}
