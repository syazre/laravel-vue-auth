<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'profile';

    protected $fillable = [
        'company',
        'phone',
        'user_id'
    ];
    
}
