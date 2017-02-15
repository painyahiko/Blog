
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

        <!-- Últimas CSS compilado y minified --> 
<link  rel= "stylesheet"  href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  integrity= "sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"  crossorigin= "anonymous" >

<!-- Tema opcional --> 
<link  rel= "stylesheet"  href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"  integrity= "sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r"  crossorigin= "anonymous" >


  <style>

  *{
    margin: 0px;
    padding: 0px;
  }

  body{
    margin-top:60px;
  }

  h1{
    font-family: 'Lato';
  }

  </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::route('home')}}">PainyaBlog</a>
        </div>

        @if(!Auth::check())
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{URL::route('login')}}">Login</a></li>
            <li><a href="{{URL::route('registro')}}">Registrarse</a></li>
            <li><a href="{{URL::route('recuperar')}}">Recuperar Contraseña</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        @elseif(Auth::user()->rol_id == '1')
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{URL::route('logout')}}">Cerrar Sesion</a></li>
          </ul>
        </div>
        @elseif(Auth::user()->rol_id == '2')
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{URL::route('backend.posts.index')}}">Post</a></li>
            <li><a href="{{URL::route('backend.categories.index')}}">Categorias</a></li>
            <li><a href="{{URL::route('logout')}}">Cerrar Sesion</a></li>
          </ul>
        </div>
        @elseif(Auth::user()->rol_id == '3')
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{URL::route('backend.posts.index')}}">Post</a></li>
            <li><a href="{{URL::route('logout')}}">Cerrar Sesion</a></li>
          </ul>
        </div>
        @elseif(Auth::user()->rol_id == '4')
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{URL::route('backend.posts.index')}}">Post</a></li>
            <li><a href="{{URL::route('backend.categories.index')}}">Categorias</a></li>
            <li><a href="{{URL::route('backend.users.index')}}">Usuarios</a></li>
            <li><a href="{{URL::route('logout')}}">Cerrar Sesion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        @endif
        
      </div>
    </nav>

    <div class="container">

    @if(session('status'))
            <p class="bg-primary" style="padding:20px;">{{ session('status') }}</p>
        @endif

     @yield('content')

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- Últimas compilado y minified JavaScript --> 
<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"  integrity= "sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"  crossorigin= "anonymous" ></script>

  </body>
</html>