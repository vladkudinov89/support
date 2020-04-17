<?php


namespace App\Actions\Common\Support\UpdateSupport;


use App\Entities\Support;

class UpdateSupportResponse
{
    /**
     * @var Support
     */
    private $support;

    /**
     * UpdateSupportResponse constructor.
     */
    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    public function toArray()
    {
        return $this->support->toArray();
    }
}
