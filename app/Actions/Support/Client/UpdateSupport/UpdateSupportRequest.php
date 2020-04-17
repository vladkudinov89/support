<?php


namespace App\Actions\Support\Client\UpdateSupport;


class UpdateSupportRequest
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $status_active;
    /**
     * @var string
     */
    private $status_view;

    /**
     * UpdateSupportRequest constructor.
     */
    public function __construct(int $id, string $title, string $message, string $status_active, string $status_view)
    {
        $this->id = $id;
        $this->title = $title;
        $this->message = $message;
        $this->status_active = $status_active;
        $this->status_view = $status_view;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getStatusActive(): string
    {
        return $this->status_active;
    }

    /**
     * @return string
     */
    public function getStatusView(): string
    {
        return $this->status_view;
    }
}
