<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListContent extends Model
{
    use HasFactory;

    protected $table = 'listcontent';
    
    public function content()
    {
        return $this->belongsTo(Contenido::class);
    }

    public function list()
    {
        return $this->belongsTo(Lists::class);
    }
}