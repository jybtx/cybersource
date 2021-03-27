<?php

namespace Jybtx\Cybersource;

use Illuminate\Support\Facades\Facade;

class CyberSourceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CyberSource';
    }
}