<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    protected $table = 'post';
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

 public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
