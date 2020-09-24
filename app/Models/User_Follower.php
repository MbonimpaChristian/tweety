<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Follower extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','follower_id'];
}
