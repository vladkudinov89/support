<?php

namespace App\Services;

use App\Console\Commands\Search\InitCommand;
use App\Entities\Support;
use Elasticsearch\Client;

class SearchService{
    private $client;
    private $initCommand;

    public function __construct(Client $client,InitCommand $initCommand)
    {
        $this->client = $client;
        $this->initCommand = $initCommand;
    }

    public function search($request)
    {
         $response = $this->client->search([
            'index' => 'app',
            'type' => 'supports',
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => [
                            ['term' => ['title' => $request]],
                            ['term' => ['message' => $request]],
                        ]
                    ]
                ],
            ]
        ]);

        return array_column($response['hits']['hits'], '_id');
    }

    public function reindex()
    {
        $this->initCommand->handle();
    }


}
