<?php

namespace App\Mail\Support\Client;

use App\Entities\Support;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CloseSupportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Support
     */
    private $support;

    /**
     * Create a new message instance.
     *
     * @return void
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
            ->markdown('email.support.client.closeSupport')
            ->with([
                'user_name' => $this->support->user->name,
                'user_id' => $this->support->user_id,
                'support_id' => $this->support->id
            ]);
    }
}
