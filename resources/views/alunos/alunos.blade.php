@extends('templates\template_aplicacao')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> <small></small> </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Pagina principal</a></li>
          <li><a href="#">Lista de Alunos</a></li>
          <!--li class="active">Blank page</li-->
        </ol>
      </section>
            <div class='text-left col-md-12 col-sm-12 col-xs-12'>
                <a href="{{url('/novo_aluno')}}" title="Cadatrar novo Curso">
                    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                </a>
            </div> 
        <!-- Main content -->
        <section class="content">
        

            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                                        <form class="" name="formPeq" id="formPesq" method="post" action="/pesquisar_aluno"> 
                     @csrf
                  <div class="box-header">
                    <h3 class="box-title">Lista de Alunos</h3>
                        <div class="box-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="text_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>

                          </div>
                        </div>
                    
                  </div>
                                            </form>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    @csrf
                    
                    <table id="tabela_alunos" class="table table-hover lista-registros">
                      <tr>
                        <th>ID</th>
                        <th>Matricula</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                      </tr>
                      <tbody>
                        @foreach($alunos as $aluno)
                            <tr>
                              <td>{{$aluno->id}}</td>
                              <td>{{$aluno->matricula}}</td>
                              <td >
                                    @if(!empty($aluno->foto) && $aluno->foto!='/' )
                                       <div class="user-block"><img class="img-circle img-bordered-sm" src="{{url($aluno->foto)}}" alt="user image"></div>
                                    @else 
                                    &nbsp;&nbsp;<i class="fa fa-2x fa-user bdg text-info"></i>
                                    @endif
                              </td>
                              <td>{{$aluno->nome}}</td>
                              <td>{{$aluno->email}}</td>
                              <td  class="{{($aluno->ativo ? 'text-success':'text-danger') }}" >{{($aluno->ativo ? 'Ativo':'Inativo') }}</td>
                              <td>
                                    <a href="{{url("/visualizar_aluno/$aluno->id")}}">
                                        <button class="btn btn-dark" title="Visualizar"><i class="fa fa-list"></i></button>
                                    </a>
                                    <a href="{{url("/editar_aluno/$aluno->id")}}">
                                        <button class="btn btn-primary" title="Editar"><i class="fa fa-pencil"></i></button>
                                    </a>
                                  <a href="{{url("/inativar_aluno/$aluno->id")}}" class="js-del" title="Excluir">
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </a>                                  
                              </td>
                            </tr>
                            @endforeach
                      </tbody>
                          
                    </table>
                    {{$alunos->links()}}
                    <input type="hidden" name="redir" id="redir" value="/lista_alunos"> 
                    <input type="hidden" name="metodo" id="metodo" value="POST"> 
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>        
        
   
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection  

