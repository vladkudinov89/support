<?php


namespace App\Actions\Common\Support\CloseSupport;


use App\Entities\Support;

class CloseSupportResponse
{
    /**
     * @var Support
     */
    private $support;

    /**
     * CloseSupportResponse constructor.
     */
    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    /**
     * @return Support
     */
    public function getSupport(): Support
    {
        return $this->support;
    }

    public function toArray(): array
    {
        return $this->support->toArray();
    }
}
