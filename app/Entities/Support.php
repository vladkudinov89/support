<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'supports';

    protected $fillable = ['title', 'message', 'status_activities','status_view', 'user_id'];

    public const STATUS_VIEWED = 'viewed';
    public const STATUS_UNVIEWED = 'unviewed';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';

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
}
