<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmobiliaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'rfc',
        'activa',
    ];

    public function getIdEncrypted()
    {
        return Crypt::encryptString($this->id);
    }
}
