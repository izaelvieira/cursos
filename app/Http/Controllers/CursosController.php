<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\CursosModel;
class CursosController extends Controller
{
    
    public  function __construct()
    {
        # code...
        $this->objCursos = new CursosModel();
    }

    /*abrir view lista curso*/
    public function frmListaCursos(){
        //$cursos = $this->objCursos->paginate(10);
        $cursos = $this->objCursos->where('ativo', 1)->paginate(4);
        return view('cursos.cursos',compact('cursos') );
    }

    /*abrir view  curso*/
    public function pesquisarCurso(Request $request){
        //$cursos = $this->objCursos->paginate(10);
        $cursos = $this->objCursos->where('id', 'like', '%'.$request->text_search.'%')
                ->orWhere('nome', 'like', '%'.$request->text_search.'%')
                ->paginate(4);
        return view('cursos.cursos',compact('cursos') );
    }
    
    public function frmVisualizarCurso($id)
    {
        //echo $id;
        $curso = $this->objCursos->find($id);
        return view('cursos.visualizar_curso', compact('curso'));
    }    
    
    public function frmEditaCurso($id)
    {
        $curso  = $this->objCursos->find($id);
        return view('cursos.create_edit_curso', compact('curso'));
    }    
    
    public function salvarCurso(Request $request, $id)
    {
        $cad =  $this->objCursos->where(['id'=>$id])->update([
                    'nome'=>$request->nome,
                ]);
        if($cad){
            return redirect('/lista_cursos');
        }
    }    

    public function frmInserirCurso()
    {
        return view('cursos.create_edit_curso');
        
    }    
    
    public function inserirCurso(Request $request)
    {
        $cad =  $this->objCursos->create([
                    'nome'=>$request->nome,
                ]);
        if($cad){
            return redirect('/lista_cursos');
        }
    }    
    
    public function inativarCurso($id)
    {
        
        /* funçao para excluir o curso, porem preferi desativar o produto
         *  a funcao ficou aqui para exibir que foi desenvolvida */
        /*
        $del = $this->objCursos->destroy($id);
        return ($del ? "sim" : "não");
        */
        
        
           $cad =  $this->objCursos->where(['id'=>$id])->update([
                        'ativo'=> '0',
                    ]);
            if($cad){
                return redirect('/lista_cursos');
            }        
    }    

    public function importarXml(Request $request) {
        
        /* upload do arquivo */
        if($request->file('caminho_xml')->isValid()){
            $dadosArquivo = $request->caminho_xml;
            $id       = $request->id; 
            $nameFile = $request->caminho_xml->getClientOriginalName();
            $url      = $request->caminho_xml->storeAs('/xml',$nameFile);
            
            if(!empty($url) ){
                $url = public_path().'/uploads/'.$url;
            }
        }
        
        /* carrega o arquivo na variavel */
        $data   = file_get_contents($url);
        $xml    = simplexml_load_string($data);

        /* percorre o array para gravar o curso*/
        foreach ($xml as $curso) {
            
            echo $curso->codigo . '     ' . $curso->nome.'<br>'; 
            /*pesquisa se existe o curso*/
            $dados      = cursosModel::where('nome',$curso->nome)
                    ->orWhere('id',$curso->id)
                    ->get();            
            
            if($dados->count() != 0 ){
                echo 'existente';
            } else{
                /* grava no banco de dados*/
                $cad =  $this->objCursos->create([
                    'id' => $curso->id,
                    'nome' => $curso->nome,
                ]);                
                
            }
        }
        return redirect('/lista_cursos');
    }
    
}
