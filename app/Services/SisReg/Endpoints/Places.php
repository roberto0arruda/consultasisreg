<?php

namespace App\Services\SisReg\Endpoints;

use Illuminate\Support\Collection;
use Symfony\Component\DomCrawler\Crawler;

class Places extends BaseEndpoint
{
    public function get(): Collection
    {
        $response = $this->service->api->get('/');

        $crawler = new Crawler((string)$response->getBody());

        $genSelectCrawler = $crawler->filter('select')->reduce(function (Crawler $node) {
            return $node->text();
        });

        return collect($genSelectCrawler->filter('option')->each(function (Crawler $option, $i) {
            if (!str_contains($option->text(), 'Escolha a Unidade')) {
                return (object)[
                    'name' => $option->text(),
                ];
            }
            return null;
        }))->filter()->values();
    }
}
