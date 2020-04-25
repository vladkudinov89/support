<?php


namespace App\Actions\Review\DeleteReview;


class DeleteReviewRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * DeleteReviewRequest constructor.
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
