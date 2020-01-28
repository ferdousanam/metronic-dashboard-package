<?php

namespace Anam\Dashboard\app\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;

class LogFailedLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        if ($event->user){
            $event->user->last_failed_login_at = Carbon::now()->toDateTimeString();
            $event->user->last_failed_login_ip = request()->getClientIp();
            $event->user->save();
        }
    }
}
