<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','User_id','post_text'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User' ,'User_id');
    }
    public function likes()
    {
        return $this->belongsToMany(Like::class, 'like__posts');
    }

}
