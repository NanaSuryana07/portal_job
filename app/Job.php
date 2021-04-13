<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Job extends Model
{
    protected $fillable = [
        'position',
        'company',
        'salary',
        'dexcription',
        'image',
    ];
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
