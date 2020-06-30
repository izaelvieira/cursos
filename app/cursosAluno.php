<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursosAluno extends Model
{
    protected $table = "alunos_cursos";
    protected $primaryKey = 'id';
     protected $fillable = ['turma','data_matricula','aluno_id','curso_id'];
    //
    
    public function aluno () {
        //return $this->belongsTo('App\Alunos','aluno_id','id');
    }
        /*relacionamento com a tabela de cursos do aluno*/
    public function curso()
    {
        return $this->belongsTo('App\CursosModel','curso_id','id');
    }
}
