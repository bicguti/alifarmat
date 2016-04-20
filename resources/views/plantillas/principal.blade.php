<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')
      {!!Html::style('/css/foundation.min.css')!!}
      {!!Html::style('/css/jquery-ui.min.css')!!}
      {!!Html::style('css/estilos.css')!!}
      {!!Html::script('/js/jquery-2.1.4.min.js')!!}
      {!!Html::script('/js/jquery-ui-1.11.4.custom/jquery-ui.min.js')!!}
      {!!Html::script('js/vendor/modernizr.js')!!}
      {!!Html::script('js/script.js')!!}
  </head>
  <body>
    <div class="row" style="margin:0">
      <div class="col-sm-12">
        <h1>Alifarmat S.A</h1>
      </div>

    </div>
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="{{ url('/') }}">Inicio</a></h1>
        </li>
        <!--Texto e icono que se muestra en dispositivos pequeños, si se remueve la aclase menu-icon, solo se mostrara el texto-->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <!-- Seccion nav derecha -->
        <ul class="left">
          <li  @if($activo == 'caja') class="has-dropdown active" @else   class="has-dropdown"      @endif>
            <a href="#">CAJA</a>
            <ul class="dropdown">
              <li><a href="#">First link in dropdown</a></li>
              <li><a href="#">Active link in dropdown</a></li>
            </ul>
          </li>
          <li @if($activo == 'reportes') class="has-dropdown active" @else   class="has-dropdown"      @endif>
            <a href="#">REPORTES</a>
            <ul class="dropdown">
              <li><a href="#">First link in dropdown</a></li>
              <li><a href="#">Active link in dropdown</a></li>
            </ul>
          </li>
          <li @if($activo == 'inventario') class="has-dropdown active" @else   class="has-dropdown"      @endif>
            <a href="#">INVENTARIO</a>
            <ul class="dropdown">
              <li><a href="{{ url('/').'/producto' }}">PRODUCTO</a></li>
              <li><a href="{{ url('/').'/presproducto' }}">PRESENTACIÓN DE PRODUCTO</a></li>
              <li><a href="{{ url('/').'/proveedor' }}">PROVEEDOR</a></li>
              <li><a href="{{ url('/').'/envio' }}">ENVIOS</a></li>
            </ul>
          </li>
          <li @if($activo == 'administracion') class="has-dropdown active" @else   class="has-dropdown"      @endif>
            <a href="#">ADMINISTRACION</a>
            <ul class="dropdown">
              <li><a href="{{ url('/').'/empleado' }}">EMPLEADO</a></li>
              <li ><a href="{{ url('/').'/puesto' }}">PUESTO</a></li>
              <li ><a href="{{ url('/').'/usuario' }}">USUARIO</a></li>
            </ul>
          </li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="right">
          <li class="has-dropdown">
          <a href="#">Nombres Autenticado</a>
            <ul class="dropdown">
              <li><a href="#">First link in dropdown</a></li>
              <li ><a href="/salir">Salir del Sistema</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </nav>


  @yield('content')


      <footer class="text-center"> Todos los derechos reservado Alifarmat&copy; 2016</footer>
      </div>
  {!!Html::script('/js/foundation.min.js')!!}
  <script type="text/javascript">
  $(document).foundation();
  </script>
  </body>
</html>
