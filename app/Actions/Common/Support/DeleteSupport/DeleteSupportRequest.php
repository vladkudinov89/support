<?php


namespace App\Actions\Common\Support\DeleteSupport;


class DeleteSupportRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * DeleteSupportRequest constructor.
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
