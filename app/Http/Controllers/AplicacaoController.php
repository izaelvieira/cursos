<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class AplicacaoController extends Controller
{
    public function index() {
        /* Verifica se há sessao*/
        if(!Session::has('login')){ return redirect('/')    ; }
        
        /* Menu Principal*/
        return view('aplicacao' );
        
    }
}
