<?php

namespace App\Listeners;

use App\Events\CounterAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCounterAddNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(CounterAddEvent $event): void
    {

    }
}
