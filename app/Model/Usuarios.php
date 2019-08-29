<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{	
	protected $table = 'Usuarios';
    protected $fillable = ['nome', 'cpf','telefone', 'complemento', 'cep', 'nascimento', 'uf', 'cidade', 'bairro'];
}
