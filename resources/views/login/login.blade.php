@extends('templates\template')
<div class="login-box">
  <div class="login-logo">
    <a href="/login"><b>LILY</b> Cursos <img src="{{asset('images/lirio.png')}}" width="70" height="70"></a>
  </div>
  <!-- /.login-logo -->
   @include('inc.erros')

@section('content')    
  <div class="login-box-body">
    <p class="login-box-msg">Faça login para iniciar sua sessão</p>

    <form  method="POST" action="/fazer_login">
      @csrf

      {{-- email--}}
      <div class="form-group has-feedback">
         <input type="text" name="text_email" id="text_email" class="form-control" placeholder="Email">
         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      {{-- senha--}}
      <div class="form-group has-feedback">
         <input type="password" name="text_senha"  id="text_senha" class="form-control" placeholder="Senha" >
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      {{-- submit --}}
      <a href="/registrar_aluno">Criar nova conta</a><br>
      
      <div class="row">
          <div class="col-xs-8">
            
          </div>
        <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
          </div>
          
        <!-- /.col -->

           
        
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection