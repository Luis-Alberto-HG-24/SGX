<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moocs extends Model
{
    use HasFactory;
    protected  $primaryKey = "id_mooc";
    protected $table = 'moocs';

    // public function mooc()
    // {
    //     return $this->belongsTo(Estudiante::class);
    // }
}
