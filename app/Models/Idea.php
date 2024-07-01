<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'like'
    ];

    public function comments(){ //This is how to define the relationship in Laravel
        return $this->hasMany(Comment::class);
    }
}
