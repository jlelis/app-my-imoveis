<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';
    protected $fillable = ['nome','imovel_id'];

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }
}
