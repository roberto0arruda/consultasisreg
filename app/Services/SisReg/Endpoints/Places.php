<?php

namespace App\Services\SisReg\Endpoints;

use Illuminate\Support\Collection;
use JsonException;
use Symfony\Component\DomCrawler\Crawler;

class Places extends BaseEndpoint
{
    /**
     * @throws JsonException
     */
    public function get(): Collection
    {
        $response = $this->service->api->get('/');

        $crawler = new Crawler((string)$response->getBody());

        $appDiv = $crawler->filter('#app');

        $dataPage = $appDiv->attr('data-page');

        // Como o data-page está em formato HTML encoded, precisamos decodificá-lo
        $decodedDataPage = html_entity_decode($dataPage);

        // Converte para array/objeto PHP
        $pageData = json_decode($decodedDataPage, false, 512, JSON_THROW_ON_ERROR);

        return collect($pageData->props->unidades)->map(function ($unidade) {
            return (object)[
                'name' => $unidade->sms_unidade_solicitante,
            ];
        });
    }
}
