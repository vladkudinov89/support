<?php


namespace App\Actions\Review\GetReviewByCurrentSupport;


use Illuminate\Database\Eloquent\Collection;

class GetReviewByCurrentSupportPresenter
{
    public static function present(Collection $collection): array
    {
        $data = [];

        foreach ($collection as $item) {
            $data[] = [
                'id' => $item->id,
                'description' => $item->description,
                'created_at' => $item->created_at,
                'user_role' => $item->user->role,
                'user_name' => $item->user->name
            ];
        }

        return $data;
    }
}
