@extends('templates\template_aplicacao')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> <small></small> </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Pagina principal</a></li>
          <li><a href="#">Lista de Cursos</a></li>
          <!--li class="active">Blank page</li-->
        </ol>
      </section>
        <div class='text-left col-md-12 col-sm-12 col-xs-12'>
            <a href="{{url('/novo_curso')}}" title="Cadatrar novo Curso">
                <button class="btn btn-success"><i class="fa fa-plus"></i></button>
            </a>
            <a href="#modal-importar" data-toggle="modal" title="Importar cursos">
                <button class="btn btn-success"><i class="fa fa-upload"></i></button>
            </a>
        </div> 
        <!-- Main content -->
        <section class="content">
        <form class="form-horizontal" name="formPeq" id="formPesq" method="post" action="/pesquisar_curso">

            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Lista de Cursos</h3>

                    <div class="box-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="text_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    @csrf
                    <table id="tabela_cursos" class="table table-hover lista-registros">
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                      </tr>
                      <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                              <td>{{$curso->id}}</td>
                              <td>{{$curso->nome}}</td>
                              <td>
                                    <a href="{{url("/visualizar_curso/$curso->id")}}">
                                        <button class="btn btn-dark" title="Visualizar"><i class="fa fa-list"></i></button>
                                    </a>
                                    <a href="{{url("/editar_curso/$curso->id")}}">
                                        <button class="btn btn-primary" title="Editar"><i class="fa fa-pencil"></i></button>
                                    </a>
                                  <a href="{{url("/inativar_curso/$curso->id")}}" class="js-del" title="Excluir">
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </a>                                  
                              </td>
                            </tr>
                            @endforeach
                      </tbody>
                          
                    </table>
                     {{$cursos->links()}}  
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>        
        
        </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    
    <div id="modal-importar" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">

              <form role="form" method="post" action="/importar_xml" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Escolher Arquivo</label>
                  <input type="file" name="caminho_xml" id="caminho_xml">

                  <p class="help-block">Escolha o arquivo para importação.</p>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Importar</button>
              </div>
            </form>
              

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    

    
@endsection  

