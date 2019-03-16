<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $dispatchesEvents = [

        'created' => BroadcastChat::class

    ];



    protected $fillable = ['user_id', 'friend_id', 'chat'];
}
