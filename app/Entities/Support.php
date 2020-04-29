<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'supports';

    protected $fillable = ['title', 'message', 'status_activities', 'status_view', 'user_id', 'admin_id_accept_exec'];

    public const STATUS_VIEWED = 'viewed';
    public const STATUS_UNVIEWED = 'unviewed';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';

    public const STATUS_HAVE_ADMIN_REVIEW = 'Have Admin Review';
    public const STATUS_NO_ADMIN_REVIEW = 'No Admin Review';
    public const STATUS_NO_REVIEW = 'No Review';

    public static function statusesActivitiesList(): array
    {
        return [
            self::STATUS_ACTIVE => 'Active Support',
            self::STATUS_CLOSED => 'Closed Support'
        ];
    }

    public static function statusesViewedList()
    {
        return [
            self::STATUS_VIEWED => 'Viewed Support',
            self::STATUS_UNVIEWED => 'Unviewed Support'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function hasReviewToSupport()
    {
        $str = '';

        if ($this->reviews->isNotEmpty()) {

            $this->reviews->each(function ($item) use (&$str) {

                if ((int)$item->user_id === User::getAdmin()->id) {
                    $str = self::STATUS_HAVE_ADMIN_REVIEW;
                } else {
                    $str = self::STATUS_NO_ADMIN_REVIEW;
                }

                return $str;
            });
            return $str;
        } else {
            $str = self::STATUS_NO_REVIEW;
            return $str;
        }
    }
}
