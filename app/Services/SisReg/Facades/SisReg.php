<?php

namespace App\Services\SisReg\Facades;

use App\Services\SisReg\Endpoints\Places;
use App\Services\SisReg\SisRegService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Places places()
 */
class SisReg extends Facade
{
    public static function getFacadeAccessor()
    {
        return SisRegService::class;
    }
}
