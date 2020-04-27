<?php


namespace App\Actions\Common\Support\CloseSupport;


class CloseSupportRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * CloseSupportRequest constructor.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
