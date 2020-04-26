<?php


namespace App\Actions\Support\Admin\ViewSupport;


use App\Entities\Support;

class ViewSupportResponse
{
    /**
     * @var Support
     */
    private $support;

    /**
     * ViewSupportResponse constructor.
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
