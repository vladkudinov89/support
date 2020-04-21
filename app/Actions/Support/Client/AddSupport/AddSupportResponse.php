<?php


namespace App\Actions\Support\Client\AddSupport;


use App\Entities\Support;

class AddSupportResponse
{
    /**
     * @var Support
     */
    private $support;

    /**
     * AddSupportResponse constructor.
     */
    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    public function toArray(): array
    {
        return $this->support->toArray();
    }
}
