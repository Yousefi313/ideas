<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $with = ['user:id','comments.user'];

    protected $fillable = [
        'user_id',
        'content',
        'like'
    ];

    public function comments(){ //This is how to define the relationship in Laravel
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
