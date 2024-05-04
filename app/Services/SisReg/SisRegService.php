<?php

namespace App\Services\SisReg;

use App\Services\SisReg\Endpoints\HasPlaces;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SisRegService
{
    use HasPlaces;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::baseUrl('https://consultasisreg.manaus.am.gov.br');
    }
}
