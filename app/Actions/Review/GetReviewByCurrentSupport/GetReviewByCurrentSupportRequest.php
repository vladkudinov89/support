<?php


namespace App\Actions\Review\GetReviewByCurrentSupport;


class GetReviewByCurrentSupportRequest
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
     * GetReviewByCurrentSupportRequest constructor.
     */
    public function __construct(int $user_id, int $support_id)
    {
        $this->user_id = $user_id;
        $this->support_id = $support_id;
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
