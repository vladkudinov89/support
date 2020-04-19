<?php


namespace App\Actions\Common\Support\GetSingleSupport;


use App\Entities\Support;

class GetSingleSupportResponse
{
    /**
     * @var Support
     */
    private $support;

    /**
     * GetSingleSupportResponse constructor.
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
