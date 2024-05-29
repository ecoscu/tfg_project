<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forolikes extends Model
{
    use HasFactory;

    protected $fillable = ['comments_id'];
    
    public function forocomment()
    {
        return $this->belongsTo('App\Models\ForoComment', 'comments_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}