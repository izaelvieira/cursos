<?php

namespace App\Http\Controllers;

use App\Alunos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\CursosModel;
use App\CursosAluno;


class AlunosController extends Controller
{
    private $objAlunos;
    private $objCursos;
    private $objCursosDoAluno;
    
    public  function __construct()
    {
        # code...
        $this->objAlunos = new Alunos();
        $this->objCursos = new CursosModel();
        $this->objCursosDoAluno = new CursosAluno();
    }

    /*abrir view novo curso*/
    public function frmListaAlunos(){
        
        $alunos = $this->objAlunos->paginate(4);
        return view('alunos.alunos',compact('alunos') );
    }
    
    /*abrir view  alunos com filtro*/
    public function pesquisarAluno(Request $request){
        
        $alunos = $this->objAlunos->where('id', 'like', '%'.$request->text_search.'%')
                ->orWhere('nome', 'like', '%'.$request->text_search.'%')
                ->orWhere('matricula', 'like', '%'.$request->text_search.'%')
                ->paginate(4);
        
        return view('alunos.alunos',compact('alunos') );
    }
    
    /*abrir view novo aluno*/
    public function frmInserirAluno()
    {
        return view('alunos.create_edit_aluno');
        
    } 
    
    /*inserir novo aluno do BD*/
    public function inserirAluno(Request $request)
    {
        /* verificação dos imputs */
        
        $this->validate($request,[
        	'nome' => 'required|between:4,30|alpha_num',
        	'email' => 'email|required|min:3',
        	'matricula' => 'required|min:5',
        	'senha' => 'required|between:3,15',
        	'confirmar_senha' => 'required|same:senha',
        	'check_termos' => 'accepted'
        ]);
        
        /* verifica se ja existe outro usuario , 
         * com o mesmo nome ou email*/
        
        $dados      = alunos::where('nome',$request->nome)
                              ->orWhere('email',$request->email)
                              ->get();
        if($dados->count() !=0 ){
            $errors_bd = ['Já existe um usuario com o mesmo nome ou email'];
            return view('alunos.create_edit_aluno', compact('errors_bd'));
        }        
        
        $cad =  $this->objAlunos->create([
                    'matricula'=>$request->matricula,
                    'nome'=>$request->nome,
                    'email'=>$request->email,
                    'endereco'=>$request->endereco,
                    'numero'=>$request->numero,
                    'complemento'=>$request->complemento,
                    'bairro'=>$request->bairro,
                    'cidade'=>$request->cidade,
                    'estado'=>$request->estado,
                    'cep'=>$request->cep,
                    'senha' => Hash::make($request->senha),
                    
                ]);
        
        
        if($cad){
            return redirect('/lista_alunos');
        }
    }    
    
    /*inserir novo aluno do BD*/
    public function adicionarCurso(Request $request,$id)
    {
        /* verificação dos imputs */
        
        $this->validate($request,[
        	'inputTurma' => 'required',
        	'inputData' => 'date',
        ]);
        //$id = $request->aluno_id;
        /* verifica se ja existe outro usuario , 
         * com o mesmo nome ou email*/
        
        $dados      = \App\CursosAluno::where('curso_id',$request->curso_id)
                              ->where('aluno_id', $id)
                              ->get();
         
        if($dados->count() !=0 ){
            $errors_bd = ['Já existe curso com o mesmo nome na lista'];
                $aluno          = Alunos::where('id',$id)->first();
                $cursosDoAluno  = $aluno->cursosDoAluno()->get();
                $cursos         = $this->objCursos->all();
                return view('alunos.create_edit_aluno', compact('aluno','cursos','cursosDoAluno','errors_bd'));
        }        
       
        $cad = \App\CursosAluno::create([
                    'turma'=>$request->inputTurma,
                    'data'=>$request->inputData,
                    'curso_id'=>$request->curso_id,
                    'aluno_id'=>$request->aluno_id,
                ]);
        
        
        if($cad){
            return redirect('/editar_aluno/'.$id);
        }
    }    
    
    
    
    /*abrir view editar aluno
     *   @param Alunos = App\alunos  (model)
     *   @param $post = filtra aluno de acordo com o passado na url.
     */
    public function frmEditarAluno($id)
    {
        /* Captura dados do Aluno*/        
        $aluno          = Alunos::where('id',$id)->first();
        
        /* captura cursos  do Aluno*/
        $cursosDoAluno  = $aluno->cursosDoAluno()->get();
        
        /* captura relação de cursos*/
        $cursos         = $this->objCursos->all();
        
        return view('alunos.create_edit_aluno', compact('aluno','cursos','cursosDoAluno'));
    }    
    
    /*Metodo para salvar edicao do  aluno*/
    public function salvarAluno(Request $request, $id)
    {
        /* verificação dos imputs */
        
        $this->validate($request,[
        	'nome' => 'required|between:4,30|alpha_num',
        	'email' => 'email|required|min:3',
        	'matricula' => 'required|min:5',
        ]);          
        $cad =  $this->objAlunos->where(['id'=>$id])->update([
                    'matricula'=>$request->matricula,
                    'nome'=>$request->nome,
                    'email'=>$request->email,
                    'endereco'=>$request->endereco,
                    'numero'=>$request->numero,
                    'complemento'=>$request->complemento,
                    'bairro'=>$request->bairro,
                    'cidade'=>$request->cidade,
                    'estado'=>$request->estado,
                    'cep'=>$request->cep,
                    'ativo' => ($request->check_ativo == 0 ? '1' : '0'),
                ]);
        if($cad){
            return redirect('/lista_alunos');
        }
    }

    
    /*abrir view visualizar aluno*/
    public function frmVisualizarAluno($id)
    {
        //echo $id;
        $aluno = $this->objAlunos->find($id);
        return view('alunos.visualizar_aluno', compact('aluno'));
    }    

    /*metodo inativar aluno*/
    public function inativarAluno($id)
    {
        
        /* funçao para excluir o aluno, porem preferi desativar o iten
         *  a funcao ficou aqui para exibir que foi desenvolvida */
        /*
        $del = $this->objAlunos->destroy($id);
        return ($del ? "sim" : "não");
        */
        
        
           $cad =  $this->objAlunos->where(['id'=>$id])->update([
                        'ativo'=> '0',
                    ]);
            if($cad){
                return redirect('/lista_alunos');
            }        
    }

    /*metodo inativar aluno*/
    public function deletarCursoAluno($id,$aluno_id)
    {
        
        $del = $this->objCursosDoAluno->destroy($id);
        
        return redirect('/editar_aluno/'.$aluno_id);
    }
    
    
    /*abrir view novo aluno*/
    public function frmRegistrarAluno(){
        return view('novo_aluno' );
    }

    /* função para validar o frmRegistrarAluno*/
    public function salvarRegistroAluno(Request $request){
        
        /* verificação dos imputs */
        
        $this->validate($request,[
        	'nome' => 'required|between:4,30',
        	'email' => 'email|required|min:3',
        	'senha' => 'required|between:3,15',
        	'confirmar_senha' => 'required|same:senha',
        	'check_termos' => 'accepted'

        ]);
        
        /* verifica se ja existe outro usuario , 
         * com o mesmo nome ou email*/
        
        $dados      = alunos::where('nome',$request->nome)
                              ->orWhere('email',$request->email)
                              ->get();
        if($dados->count() !=0 ){
            $errors_bd = ['Já existe um usuario com o mesmo nome ou email'];
            return view('novo_aluno', compact('errors_bd'));
        }
        
        /* inserir novo usuario */
        $novo  = new alunos;
        $novo->nome = $request->nome;
        $novo->email = $request->email;
        $novo->senha = Hash::make($request->senha);
        $novo->save();
        
        return redirect('/');
        
    }


    /* inserir Usuario na tabela para testes */
    public function InserirAlunoPadrao(){
    	$nome  = '';
    	$email = '';
    	$senha = '';
    	
    	$novo  = new alunos;
    	$novo->nome = 'Izael';
    	$novo->email = 'izael@izael';
    	$novo->senha = Hash::make('1234');
    	$novo->save();
		
    	$novo  = new alunos;
    	$novo->nome = 'Joao';
    	$novo->email = 'joao@joao';
    	$novo->senha = Hash::make('3361');
    	$novo->save();

    	return('Usuario inserido com sucesso');
         
    }	

    public function carregarFoto(Request $request) {
        if($request->file('photo')->isValid()){
            //$dadosArquivo = $request->xml;
            //dd($request->foto->store('/alunos'));
            $id       = $request->id; 
            $nameFile = 'photo-'.$request->id .'.'.$request->photo->extension();
            $retorno  = $request->photo->storeAs('/alunos',$nameFile);
        }
        
        $cad =  $this->objAlunos->where(['id'=>$id])->update([
                    'foto'=> 'uploads/'.$retorno,
                ]);
        if($cad){
            return redirect('/editar_aluno/'.$id);
        }                
        
    }    
    
}
