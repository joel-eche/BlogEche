<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title','Default') | Panel de Administración</title>
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/trumbowyg/ui/trumbowyg.css')}}">
</head>
<body>
  <header id="header" class="">
    @include('front.template.partials.header')
  </header>
  <div class="container">
    @yield('content')
    <footer>
      <hr>
      Blog - Laravel &copy {{date('Y')}}
      <div class="pull-right">
        Joel Eche
      </div>
    </footer>
  </div>
    <!--@.include('admin.template.partials.nav')
    <section>
      <div class="panel panel-default">
        <div class="panel-body">
          @.include('flash::message')
          @.include('admin.template.partials.errors')
          @.yield('content','Content default')
        </div>
      </div>
    </section>
  -->
  <script src="{{asset('plugins/jquery/js/jquery-3.1.0.min.js')}}"></script>
  <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}" ></script>
  <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"> </script>
  <script src="{{asset('plugins/trumbowyg/trumbowyg.js')}}"></script>
  @yield('js')
</body>
</html>
