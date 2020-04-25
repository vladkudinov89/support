<?php


namespace App\Actions\Review\UpdateReview;


class UpdateReviewRequest
{
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $id;

    /**
     * UpdateReviewRequest constructor.
     */
    public function __construct(int $id,string $description)
    {
        $this->description = $description;
        $this->id = $id;
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
    public function getDescription(): string
    {
        return $this->description;
    }
}
