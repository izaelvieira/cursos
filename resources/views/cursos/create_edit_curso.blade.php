@extends('templates\template_aplicacao')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> <small></small> </h1>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-dashboard"></i>Pagina principal</a></li>
          <li><a href="/lista_cursos">Lista de Cursos</a></li>
          <li class="active">Criação / Edição </li-->
        </ol>
      </section>
    <section class="content">
            <div  class=" col-md-12 ">
           {{-- apresentação de erros de validação --}}
           @include('inc.erros')
           {{-- ----------------------------------- --}}
            <div  class="box box-info ">
                <div class="box-header with-border">
                  <h3 class="box-title">@if(isset($curso)) Editar @else Cadastrar @endif</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
              @if(isset($curso))
                 <form class="form-horizontal" name="formEdit" id="formEdit" method="post" action="{{url("/salvar_curso/$curso->id")}}">
                  @method('PUT')
              @else 
                 <form class="form-horizontal" name="formCad" id="formCad" method="post" action="/inserir_curso">
              @endif
                      @csrf
                    
                      <div class="box-body">
                            <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                               <div class="col-sm-10"> 
                                   <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Aluno" value="{{$curso->nome ?? ''}}" required>
                              </div>
                            </div>

                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                           <a href="/lista_cursos" class="btn btn-default">Voltar</a>
                        <input type="submit" class="btn btn-info pull-right" value="@if(isset($curso)) Editar @else Cadastrar @endif">
                      </div>
                      <!-- /.box-footer -->
                </form>
          </div>        

        </div>  
    </div>
    </section> 
  </div>
  <!-- /.content-wrapper -->    
@endsection
