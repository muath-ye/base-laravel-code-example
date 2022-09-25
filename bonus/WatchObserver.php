<?php

namespace App\Observers;

use App\User;
use App\Watch;

class WatchObserver
{
    public function created(Watch $watch)
    {
        $user = User::find($watch->user_id);

        \Newsletter::addTags(['Video-'.$watch->video_id], $user->email);
    }
}
