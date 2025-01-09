<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'fields_of_work',
        'linkedin_username',
        'mobile_number',
        'registration_fee',
        'wallet_balance',
    ];

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
