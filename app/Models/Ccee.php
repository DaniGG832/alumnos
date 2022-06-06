<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ccee extends Model
{
    use HasFactory;

    protected $fillable = ['ce','descripcion'];

    public function notas()
    {
        # code...
        return $this->hasMany(Nota::class);
    }
}
