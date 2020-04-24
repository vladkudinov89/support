<?php


namespace App\Actions\Review\AddReviewToCurrentSupport;


class AddReviewToCurrentSupportRequest
{
    /**
     * @var int
     */
    private $user_id;
    /**
     * @var int
     */
    private $support_id;
    /**
     * @var string
     */
    private $description;

    /**
     * AddReviewToCurrentSupportRequest constructor.
     */
    public function __construct(int $user_id , int $support_id , string $description)
    {
        $this->user_id = $user_id;
        $this->support_id = $support_id;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getSupportId(): int
    {
        return $this->support_id;
    }
}
