<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'dob',
        'address',
        'state',
        'country',
        'img',
    ];
    public function user (){
        return $this->belongsTo(User::class);
    }
}
