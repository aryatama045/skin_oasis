<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'recipient_id');
    }

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }
}