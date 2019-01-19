<?php

namespace App\Exceptions;

use Exception;

class ThrottleException extends Exception{
    protected $isReport = false;

    public function isReport(){
        return $this->isReport;
    }
}