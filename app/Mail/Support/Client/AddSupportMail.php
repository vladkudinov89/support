<?php

namespace App\Mail\Support\Client;

use App\Entities\Support;
use App\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddSupportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Support
     */
    private $support;

    /**
     * Create a new message instance.
     *
     * @param Support $support
     */
    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('email.support.client.addSupport')
            ->with([
                'user_name' => $this->support->user->name,
                'user_id' => $this->support->user_id,
                'support_id' => $this->support->id,
                'support_title' => $this->support->title,
                'support_message' => $this->support->message
            ]);
    }
}
