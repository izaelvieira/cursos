<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursosModel extends Model
{
    protected $table    = 'cursos';
    protected $primaryKey = 'id';
    protected $fillable = ['nome'];
    

        
    
}
