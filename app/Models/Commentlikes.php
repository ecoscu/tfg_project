<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentlikes extends Model
{
    use HasFactory;

    protected $fillable = ['comments_id']; // Ajusta según tus necesidades

    public function comment()
    {
        return $this->belongsTo('App\Models\Comment', 'comments_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function content()
    {
        return $this->belongsTo(Contenido::class);
    }
}