<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
    'user_id',
    'title',
    'amount',
    'category',
    'description'
];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
