<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Alunos;
use Session;


class LoginController extends Controller
{

    public function index(){
        /* Verifica se há sessao*/
        if(!Session::has('login')){ 
            return $this->frmLogin();    
        } else {
            return view('aplicacao');
        }
         
       
    }

    /*abrir view login*/
    public function frmLogin(){
        return view('login.login' );
    }
    
    /*abrir view recuperar senha*/
    public function frmRecuperarSenha(){
        return view('login.recuperar_senha' );
    }
    
    /* função para validar o login e sessao do Aluno */
    public function fazerLogin(Request $request){
        
        $resultado = "";
        /* verificação dos imputs */
        $this->validate($request,[
        	'text_email' => 'email|required|min:3',
        	'text_senha' => 'required|min:3'

        ]);
        
	/* verifica se os dados login estao corretos */
        $dados      = alunos::where('email',$request->text_email)->first();
        
        if(!empty($dados->senha) ){
            if(Hash::check($request->text_senha, $dados->senha)){
                //$errors_bd = ["logado"];
                /*criar ou abrir sessão*/
                Session::put('login','sim');
                Session::put('alunoId',$dados->id);
                Session::put('alunoNome',$dados->nome);
                Session::put('alunoEmail',$dados->email);
                Session::put('alunoMatricula',$dados->matricula);
                Session::put('alunoFoto',$dados->foto);
                return redirect('/');
            }else{
                $errors_bd = ['Senha Invalida...'];
                return view('login.login', compact('errors_bd'));                
            }
        }else{
            $errors_bd = ['Não existe esta conta de email cadastrada...'];
            return view('login.login', compact('errors_bd'));
        }
    }
    
    /* função para validar o login e sessao do Aluno */
    public function fazerLogout(){
        /* destruir a sessao e redirecionar para o frm de login*/
        Session::flush();
        return redirect('/');
    }    
    
    /* função para validar o login e sessao do Aluno */
    public function recuperarSenha(Request $request){
        
        $resultado = "";
        /* verificação dos imputs */
        $this->validate($request,[
        	'email' => 'email|required|min:3',

        ]);
        
    }
    
}
