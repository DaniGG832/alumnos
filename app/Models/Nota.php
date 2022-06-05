<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    public function alumno()
    {
        # code...
        return $this->belongsTo(Alumno::class);
        
    }

    public function ccee()
    {
        # code...
        return $this->belongsTo(Ccee::class);
        
    }
}
