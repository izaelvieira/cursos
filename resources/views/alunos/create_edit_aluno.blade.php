@extends('templates\template_aplicacao')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> @if(isset($aluno)) Editar @else Cadastrar @endif<small></small> </h1>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-dashboard"></i>Pagina principal</a></li>
          <li><a href="/lista_alunos">Lista de Alunos</a></li>
          <li class="active">Criação / Edição </li-->
        </ol>
      </section>
    <section class="content">
             @if(isset($aluno))
            <div  class=" col-md-4 ">
                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                      
                      <a href="#modal-file"  data-toggle="modal" title="Carregar Foto">
                        @if(!empty($aluno->foto) && $aluno->foto!='/' )
                           <img class="profile-user-img img-responsive img-circle" src="{{url($aluno->foto)}}" alt="Foto de Perfil do Usuario">
                        @else 
                        <div class="text-center"> <i class="fa fa-2x fa-user bdg text-info fa-5x"></i></div>
                        @endif                        
                    </a>                      
                    

                    <h3 class="profile-username text-center">{{$aluno->nome ?? ''}}</h3>

                    <p class="text-muted text-center">Matricula {{$aluno->matricula ?? ''}}</p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                          <h3 class="text-center"> Cursos Consumidos </h3>
                      </li>
                      @foreach($cursosDoAluno as $item)
                        <li class="list-group-item">
                            <b>{{$item->curso->nome.' - '.$item->turma}}</b> <a href="{{ url('/deletar_curso_aluno/'.$item->id.'/'.$aluno->id)}}" class="pull-right js-del" >{{ date('d/m/Y', strtotime($item->data_matricula)) }}&nbsp;&nbsp; <i class="fa fa-trash text-danger" title=" Excluir curso consumido pelo aluno"></i></a>
                        </li>
                      @endforeach
                    </ul>

                    <a href="#modal-add-cursos" data-toggle="modal" class="btn btn-primary btn-block"><b>Adicionar Curso</b></a>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                
            </div>
             @endif
            <div  class=" {{(isset($aluno) ? 'col-md-8' : 'col-md-12')}} ">
               {{-- apresentação de erros de validação --}}
               @include('inc.erros')
               {{-- ----------------------------------- --}}
                <div  class="box box-info ">
                    <div class="box-header with-border">
                      <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                  @if(isset($aluno))
                     <form class="form-horizontal" name="formEdit" id="formEdit" method="post" action="{{url("salvar_aluno/$aluno->id")}}">
                      @method('PUT')
                  @else 
                     <form class="form-horizontal" name="formCad" id="formCad" method="post" action="/inserir_aluno">
                  @endif
                          @csrf            
                          <div class="box-body">
                                <div class="">
                                    <div class="form-group">
                                      <label for="inputPassword3" class="col-sm-2 control-label">Matricula</label>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matricula" value="{{$aluno->matricula ?? ''}}">
                                      </div>
                                    </div>
                                </div>                              
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
                                   <label for="Labelcep" class="col-sm-2 control-label">Cep</label>
                                   <div class="col-sm-4"> 
                                      <input type="text" class="form-control cep" name="cep" id="cep" placeholder="Cep do Aluno" value="{{$aluno->cep ?? ''}}">
                                   </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputEndereco" class="col-sm-2 control-label">Endereço</label>
                                   <div class="col-sm-10"> 
                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço do Aluno" value="{{$aluno->endereco ?? ''}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputNumero" class="col-sm-2 control-label">Numero</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero " value="{{$aluno->numero ?? ''}}">
                                  </div>
                                   <label for="inputComplemento" class="col-sm-2 control-label">Complemento</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{$aluno->complemento ?? ''}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputNumero" class="col-sm-2 control-label">Bairro</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro do Aluno" value="{{$aluno->estado ?? ''}}">
                                  </div>
                                   <label for="inputComplemento" class="col-sm-2 control-label">Cidade</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade do Aluno" value="{{$aluno->cidade ?? ''}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="inputNumero" class="col-sm-2 control-label">UF</label>
                                   <div class="col-sm-4"> 
                                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado do Aluno" value="{{$aluno->estado ?? ''}}">
                                  </div>
                                </div>
                                @if(!isset($aluno))
                                <div class="">
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
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name="check_termos" id="check_termos" value="1"> Concordo com Termos e Condições
                                      </label>
                                    </div>
                                </div>
                                @endif
                                @if(isset($aluno))
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name="check_ativo" id="check_ativo" value="{{$aluno->ativo  ?? '0'}}" > Aluno Ativo
                                      </label>
                                    </div>
                                </div>                           
                                @endif
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <a href="/lista_alunos" class="btn btn-default">Voltar</a>
                            <input type="submit" class="btn btn-info pull-right" value="@if(isset($aluno)) Editar @else Cadastrar @endif">
                          </div>
                          <!-- /.box-footer -->
                    </form>
              </div>        

        </div>
    </section> 
  </div>
  <!-- /.content-wrapper -->    
  
  
  <!-- /.modal de Importação da foto do Aluno-->    
    <div id="modal-file" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="/carregar_foto" enctype="multipart/form-data">
                          @csrf
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputFile">Escolher Arquivo</label>
                              <input type="file" name="photo" id="photo">
                              <input type="hidden" name="id" id="id_aluno" value="{{$aluno->id ?? ''}}">
                              <p class="help-block">Escolha o arquivo para importação.</p>
                            </div>

                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Importar</button>
                            </div>
                          </div>
                    </form>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->    
    </div>

    
    
    <!-- /.modal  Adicionar curso-->    
    <div id="modal-add-cursos" class="modal fade" tabindex="-1"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Cursos</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="post" action="/adicionar_curso_aluno/{{$aluno->id ?? ''}}" >
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_curso" class="col-sm-3 control-label">Curso</label>
                                <div class="col-sm-9"> 
                                    <select class="form-control" name="curso_id"  required>
                                        <option value="">Selecione</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label for="inputTurma" class="col-sm-3 control-label">Turma</label>
                               <div class="col-sm-9"> 
                                <input type="text" class="form-control" name="inputTurma" id="inputTurma" placeholder="Turma do Curso" value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                               <label for="inputTurma" class="col-sm-3 control-label">Data Matricula</label>
                               <div class="col-sm-9"> 
                                   <input type="text" class="form-control data-mask" name="inputData" id="inputData" placeholder="Data Matricula" value="" required>
                              </div>
                            </div>
                            <input type="hidden" name="aluno_id"  value="{{$aluno->id ?? ''}}">
                            <input type="hidden" name="redir" id="redir" value="/edita_aluno/{{$aluno->id ?? ''}}"> 
                            <input type="hidden" name="metodo" id="metodo" value="DELETE">
                        </div>
                        
                        <div class="box-footer"><button type="submit" class="btn btn-primary">Adicionar</button></div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    
    
    
    
@endsection
