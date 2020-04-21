<?php


namespace App\Actions\Support\Client\AddSupport;


class AddSupportRequest
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $message;
    /**
     * @var int
     */
    private $user_id;

    /**
     * AddSupportRequest constructor.
     * @param string $title
     * @param string $message
     * @param int $user_id
     */
    public function __construct(string $title , string  $message , int $user_id)
    {
        $this->title = $title;
        $this->message = $message;
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
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
}
