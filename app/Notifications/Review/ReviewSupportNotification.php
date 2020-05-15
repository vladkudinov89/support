<?php

namespace App\Notifications\Review;

use App\Entities\Support;
use App\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReviewSupportNotification extends Notification
{
    use Queueable;

    /**
     * @var Support
     */
    private $support;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new notification instance.
     *
     * @param Support $support
     * @param User $user
     */
    public function __construct(Support $support , User $user)
    {
        $this->support = $support;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database' , 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'notification' => $this->notificationMessage($this->user),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'notification' => $this->notificationMessage($this->user),
        ]);
    }

    private function notificationMessage(User $user)
    {
        return [
            'subject' => $this->support,
            'subject_user' => $user,
            'type' => self::class
        ];
    }
}
