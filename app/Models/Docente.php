<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = ['user_id', 'rut', 'telefono', 'asignatura_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    
}

