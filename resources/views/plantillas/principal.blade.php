<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    @yield('title')
      {!!Html::style('/css/bootstrap.min.css')!!}
      {!!Html::style('/css/bootstrap-theme.min.css')!!}
      {!!Html::style('/css/jquery-ui.min.css')!!}
      {!!Html::style('css/estilos.css')!!}
      {!!Html::script('/js/jquery-2.1.4.min.js')!!}
      {!!Html::script('/js/jquery-ui-1.11.4.custom/jquery-ui.min.js')!!}
      {!!Html::script('js/script.js')!!}
  </head>
  <body>
    <div class="row" style="margin:0">
      <div class="col-sm-12">
        <h1>Alifarmat S.A</h1>
      </div>

    </div>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo url('/') ?>">Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CAJA <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">REPORTES<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">INVENTARIO<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMINISTRACION<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/').'/empleado' }}">EMPLEADO</a></li>
            <li><a href="<?php echo url('/')?>/puesto">PUESTO</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario Autenticado <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">SALIR DEL SISTEMA</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

<div class="row" style="margin: 0">

<div class="col-sm-12">





<div class="col-sm-12">
  @yield('content')
</div>

      <footer class="text-center"> Todos los derechos reservado Alifarmat&copy; 2016</footer>
      </div>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  </body>
</html>
