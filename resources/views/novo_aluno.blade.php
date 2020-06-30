@extends('templates\template')
    <div class="row ">  
       <div class="login-logo">
         <a href="/login"><b>LILY</b> Cursos <img src="{{asset('images/lirio.png')}}" width="70" height="70"></a>
       </div>
    </div>
    @section('content')
    <div class="row ">
        <div  class=" col-md-3 "></div>
        <div  class=" col-md-6 ">
           {{-- apresentação de erros de validação --}}
           @include('inc.erros')
           {{-- ----------------------------------- --}}
            <div  class="box box-info ">
                <div class="box-header with-border">
                  <h3 class="box-title">@if(isset($aluno)) Editar @else Cadastrar @endif</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
              @if(isset($aluno))
                 <form class="form-horizontal" name="formEdit" id="formEdit" method="post" action="{{url("alunos/$aluno->id")}}">
                  @method('PUT')
              @else 
                 <form class="form-horizontal" name="formCad" id="formCad" method="post" action="/salvar_registro_aluno">
              @endif
                      @csrf            
                      <div class="box-body">
                            <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                               <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Aluno" value="{{$aluno->nome ?? ''}}">
                              </div>
                            </div>
                            <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                               <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$aluno->email ?? ''}}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Confirmar Senha</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha" placeholder="Senha">
                              </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="check_termos" id="check_termos" value="1"> Concordo com Termos e Condições
                              </label>
                            </div>
                          </div>                           

                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        @if(isset($aluno))
                           <a href="/"><button class="btn btn-default">Voltar2</button></a>
                        @else 
                           <a href="/" class="btn btn-default">Voltar</a>
                        @endif
                        <input type="submit" class="btn btn-info pull-right" value="@if(isset($aluno)) Editar @else Cadastrar @endif">
                      </div>
                      <!-- /.box-footer -->
                </form>
          </div>        

        </div>  
    </div>
    @endsection
