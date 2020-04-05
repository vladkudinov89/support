<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'supports';

    protected $fillable = ['title' , 'message' , 'status'];

    public const STATUS_VIEWED = 'viewed';
    public const STATUS_UNVIEWED = 'unviewed';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_CLOSED = 'closed';

    public static function statusesList(): array
    {
        return [
            self::STATUS_VIEWED => 'Viewed Support',
            self::STATUS_UNVIEWED => 'Unviewed Support',
            self::STATUS_ACTIVE => 'Active Support',
            self::STATUS_CLOSED => 'Closed Support',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
