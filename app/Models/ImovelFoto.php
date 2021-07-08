<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelFoto extends Model
{
    use HasFactory;
    protected $fillable =['path_images','imovel_id'];
}
