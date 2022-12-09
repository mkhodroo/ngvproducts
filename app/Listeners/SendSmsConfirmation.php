<?php

namespace App\Listeners;

use App\Events\SendSms;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendSmsConfirmation implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $mobile, $text;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendSms  $event
     * @return void
     */
    public function handle(SendSms $event)
    {
        $this->mobile = $event->mobile;
        $this->text = $event->text;
        sleep(20);
        Log::info("mobile: $this->mobile, text: $this->text");
    }
}
