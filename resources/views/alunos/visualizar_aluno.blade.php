@extends('templates\template_aplicacao')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> <small></small> </h1>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-dashboard"></i>Pagina principal</a></li>
          <li><a href="/lista_alunos">Lista de Alunos</a></li>
          <li class="active">Visualização</li-->
        </ol>
      </section>
    <section class="content">
            <div  class=" col-md-4 ">
                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                      
                        <img class="profile-user-img img-responsive img-circle" src="{{url($aluno->foto)}}" alt="Foto de Perfil do Usuario">
                    

                    <h3 class="profile-username text-center">{{$aluno->nome ?? ''}}</h3>

                    <p class="text-muted text-center">Matricula {{$aluno->matricula ?? ''}}</p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                          <h3 class="text-center"> Cursos Consumidos </h3>
                      </li>
                      <li class="list-group-item">
                        <b>Administracao</b> <a class="pull-right">05/03/2019</a>
                      </li>
                      <li class="list-group-item">
                        <b>Ingles</b> <a class="pull-right">18/04/2017</a>
                      </li>
                      <li class="list-group-item">
                        <b>Gestao de Projetos</b> <a class="pull-right">18/06/2020</a>
                      </li>
                    </ul>

                    
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                
            </div>
        
            <div  class=" col-md-8 ">
                <div  class="box box-info ">
                    <div class="box-header with-border">
                      <h3 class="box-title">Visualizar</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  >
                          <div class="box-body">
                                <div class="">
                                    <div class="form-group">
                                      <label for="inputPassword3" class="col-sm-2 control-label">Matricula</label>
                                      <div class="col-sm-4">
                                          <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matricula" value="{{$aluno->matricula ?? ''}}" readonly="readonly" >
                                      </div>
                                    </div>
                                </div>                              
                                <div class="form-group">
                                   <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                                   <div class="col-sm-10"> 
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Aluno" value="{{$aluno->nome ?? ''}}" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                   <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$aluno->email ?? ''}}" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="Labelcep" class="col-sm-2 control-label">Cep</label>
                                   <div class="col-sm-4"> 
                                      <input type="text" class="form-control cep" name="cep" id="cep" placeholder="Cep do Aluno" value="{{$aluno->cep ?? ''}}" readonly>
                                   </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
                                   <div class="col-sm-10"> 
                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço do Aluno" value="{{$aluno->endereco ?? ''}}" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputNumero" class="col-sm-2 control-label">Numero</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero " value="{{$aluno->numero ?? ''}}" readonly>
                                  </div>
                                   <label for="inputComplemento" class="col-sm-2 control-label">Complemento</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{$aluno->complemento ?? ''}}" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputNumero" class="col-sm-2 control-label">Bairro</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro do Aluno" value="{{$aluno->estado ?? ''}}" readonly>
                                  </div>
                                   <label for="inputComplemento" class="col-sm-2 control-label">Cidade</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade do Aluno" value="{{$aluno->cidade ?? ''}}" readonly>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputNumero" class="col-sm-2 control-label">UF</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado do Aluno" value="{{$aluno->estado ?? ''}}" readonly>
                                  </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="check_ativo" id="check_ativo" value="{{$aluno->ativo ?? '0'}}" disabled=""> Aluno Ativo
                                      </label>
                                    </div>
                                </div>                           
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <a href="/lista_alunos" class="btn btn-default">Voltar</a>
                          </div>
                          <!-- /.box-footer -->
                    </form>
              </div>        

        </div>
    </section> 
  </div>
  <!-- /.content-wrapper -->    
@endsection
