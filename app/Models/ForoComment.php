<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForoComment extends Model
{
    use HasFactory;
    protected $table = 'forocomments';
    protected $fillable = [
        'comment', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forolikes()
    {
        return $this->hasMany('App\Models\Forolikes', 'comments_id');
    }
}