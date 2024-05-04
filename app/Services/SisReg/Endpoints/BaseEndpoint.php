<?php

namespace App\Services\SisReg\Endpoints;

use App\Services\SisReg\SisRegService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected SisRegService $service;

    public function __construct()
    {
        $this->service = new SisRegService();
    }

    protected function transform(mixed $datas, string $entity): Collection
    {
        return collect($datas)->map(fn($data) => new $entity($data));
    }
}
