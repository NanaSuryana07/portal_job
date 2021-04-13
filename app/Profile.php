<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'ed_ex',
        'photo',
        'cv',
    ];

    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
