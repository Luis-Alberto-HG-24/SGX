<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultural extends Model
{
    use HasFactory;
    protected  $primaryKey = "id_creditoCultural";
    protected $table = 'credito_cultural';
}
