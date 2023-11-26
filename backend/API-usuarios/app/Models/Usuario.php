<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nome', 'sobrenome', 'nascimento', 'cpf', 'email', 'senha', 'genero', 'estado'];
}
