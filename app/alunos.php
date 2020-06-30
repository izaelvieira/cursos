<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $table    = 'alunos';
    protected $primaryKey = 'id';
    protected $fillable = ['nome','email','senha','endereco','numero','complemento','bairro','cidade','estado','ativo'];
    
    /*relacionamento com a tabela de cursos do aluno*/
    public function cursosDoAluno(){
        
        //return $this->belongsToMany('App\CursosModel','alunos_cursos','aluno_id','curso_id');
        return $this->hasMany('App\CursosAluno','aluno_id','id');
    }
    
}
