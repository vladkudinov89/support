<?php


namespace App\Actions\Support\Admin\ViewSupport;


class ViewSupportRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * ViewSupportRequest constructor.
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
