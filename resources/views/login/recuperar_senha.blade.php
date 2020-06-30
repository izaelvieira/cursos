@extends('templates\template')
    <div class="row ">  
       <div class="login-logo">
         <a href="/login"><b>LILY</b> Cursos <img src="{{asset('images/lirio.png')}}" width="70" height="70"></a>
       </div>
    </div>
@section('content')
<div class="row ">
  <div class="col-md-3"></div>
  <div class="col-md-6" style="padding: 30px 30px 30px 30px">
       {{-- apresentação de erros de validação --}}
       @include('inc.erros')
       {{-- ----------------------------------- --}}
      <div  class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recuperar Senha</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form class="form-horizontal" name="formCad" id="formCad" method="post" action="/executar_recuperar_senha">
                  @csrf            
                  <div class="box-body">
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-10"> 
                            <input type="email" class="form-control" name="email" id="email" placeholder="Informe o seu Email" >
                          </div>
                        </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                       <a href="/" class="btn btn-default">Voltar</a>
                    <input type="submit" class="btn btn-info pull-right" >
                  </div>
                  <!-- /.box-footer -->
            </form>
      </div>
  </div>  

</div>  
@endsection