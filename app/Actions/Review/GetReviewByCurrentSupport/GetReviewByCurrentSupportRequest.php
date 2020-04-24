<?php


namespace App\Actions\Review\GetReviewByCurrentSupport;


class GetReviewByCurrentSupportRequest
{
    /**
     * @var int
     */
    private $support_id;

    /**
     * GetReviewByCurrentSupportRequest constructor.
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
