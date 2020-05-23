<?php

namespace App\Console\Commands\Search;

use App\Actions\Support\Admin\GetAllSupports\GetAllSupportsPresenter;
use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InitCommand extends Command
{
    protected $signature = 'search:init';

    private $client;

    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    public function handle(): bool
    {
        $this->initSupports();

        return true;
    }

    private function initSupports()
    {
        try {
            $this->client->indices()->delete([
                'index' => 'app'
            ]);
        } catch (Missing404Exception $e) {
        }

        $this->client->indices()->create([
           'index' => 'app',
            'body' => [
                'mappings' =>[
                    'supports' => [
                        'properties' => [
                            'id' => [
                                'type' => 'integer'
                            ],
                            'title' => [
                                'type' => 'text'
                            ],
                            'message' => [
                                'type' => 'text'
                            ],
                            'status_activities' => [
                                'type' => 'text'
                            ],
                            'status_view' => [
                                'type' => 'text'
                            ],
                        ]
                    ]
                ],

                'settings' => [
                    'analysis' => [
                        'char_filter' => [
                            'replace' => [
                                'type' => 'mapping',
                                'mappings' => [
                                    '&=> and '
                                ],
                            ],
                        ],
                        'filter' => [
                            'word_delimiter' => [
                                'type' => 'word_delimiter',
                                'split_on_numerics' => false,
                                'split_on_case_change' => true,
                                'generate_word_parts' => true,
                                'generate_number_parts' => true,
                                'catenate_all' => true,
                                'preserve_original' => true,
                                'catenate_numbers' => true,
                            ],
                            'trigrams' => [
                                'type' => 'ngram',
                                'min_gram' => 2,
                                'max_gram' => 3,
                            ],
                        ],
                        'analyzer' => [
                            'default' => [
                                'type' => 'custom',
                                'char_filter' => [
                                    'html_strip',
                                    'replace',
                                ],
                                'tokenizer' => 'whitespace',
                                'filter' => [
                                    'lowercase',
                                    'word_delimiter',
                                    'trigrams',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ]);

        foreach (DB::table('supports')
                     ->orderBy('id')->cursor() as $support) {
            $this->client->index([
                'index' => 'app',
               'type' => 'supports',
               'id' => $support->id,
                'body' =>
                [
                    'id' => $support->id,
                    'title' => $support->title,
                    'message' => $support->message,
                    'status_activities' => $support->status_activities,
                    'status_view' => $support->status_view,
                ]
            ]);
        }


    }
}
