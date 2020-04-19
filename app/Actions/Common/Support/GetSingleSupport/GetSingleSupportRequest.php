<?php


namespace App\Actions\Common\Support\GetSingleSupport;


class GetSingleSupportRequest
{
    /**
     * @var int
     */
    private $support_id;

    /**
     * GetSingleSupportRequest constructor.
     */
    public function __construct(int $support_id)
    {
        $this->support_id = $support_id;
    }

    /**
     * @return int
     */
    public function getSupportId(): int
    {
        return $this->support_id;
    }

}
