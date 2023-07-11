<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserListener
{
    
    public function handle($event)
    {
        dd('ok');
    }
}
