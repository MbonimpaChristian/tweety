<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable =[
        'id','User_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','User_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'like__posts');
    }

}
