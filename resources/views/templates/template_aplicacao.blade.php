<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LILY Cursos </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('assets/layout_admin/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('assets/layout_admin/plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/layout_admin/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/layout_admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="{{asset('images/lirio.png')}}" width="50" height="50"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>LILY</b> Cursos <img src="{{asset('images/lirio.png')}}" width="50" height="50"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{url(session('alunoFoto'))}}" width="50" height="50" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{session('alunoNome')}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{url(session('alunoFoto'))}}"  width="160" height="120" class="img-circle" alt="User Image">

                    <p>
                      {{session('alunoNome')}} -  {{session('alunoMatricula')}}
                      <small>{{session('alunoEmail')}}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/editar_aluno/{{session('alunoId')}}" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="/fazer_logout" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Principal</li>
            <li><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="/lista_alunos"><i class="fa fa-user"></i> <span>Alunos</span></a></li>
            <li><a href="/lista_cursos"><i class="fa fa-table"></i> <span>Cursos</span></a></li>        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->    
    
          
        @yield('content')
        






      <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->        
    
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('assets/layout_admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{asset('assets/layout_admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>    
    <script src="{{asset('assets/layout_admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/layout_admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>    
    <script src="{{asset('assets/layout_admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/layout_admin/plugins/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('assets/layout_admin/dist/js/app.min.js')}}"></script>
    <script src="{{asset('assets/layout_admin/dist/js/demo.js')}}"></script> 
    <script type="text/javascript" src="{{url("assets/js/javascript.js")}}"></script>

    
</body>
</html>
