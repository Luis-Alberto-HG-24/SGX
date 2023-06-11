<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Civico extends Model
{
    use HasFactory;
    protected  $primaryKey = "id_creditoCivico";
    protected $table = 'credito_civico';

    
}
