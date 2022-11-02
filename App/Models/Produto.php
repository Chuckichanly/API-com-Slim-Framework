<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

//inserçao do eloquent

class Produto extends Model {
    protected $fillable = [
	    'titulo', 'descricao', 'preco', 
	    'fabricante', 'updated_at', 'created_at'
    ];
}