<?php

namespace App\Services\SisReg\Endpoints;

trait HasPlaces
{
    public function places(): Places
    {
        return new Places();
    }
}
