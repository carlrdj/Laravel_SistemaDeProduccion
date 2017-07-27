<!doctype html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AMPUERO S.A.C. - @yield('title')</title>
    <!-- Config -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="/css/icon.css">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- TokenScripts -->
    <script>
      window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body>
    <!-- YieldContent -->
    @yield('content')
    <!-- EndYiledBlade -->
    <!-- Script -->
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
    <script type="text/javascript" src="/js/jquery.twbsPagination.js"></script>
    <!-- EndScript -->
    <!-- YieldScript -->
    @yield('script')
    <!-- EndYieldScript -->
    <!-- ScriptNavBar -->
    <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
      });
      
      $('.modal').modal({
        dismissible: true,
        opacity: .5,
        inDuration: 300,
        outDuration: 200,
        startingTop: '4%',
        endingTop: '10%',
        ready: function(modal, trigger) {
          $('input:visible:first', this).focus();
        },
        complete: function() {
          $('input', this).val('');
        }
      });
    </script>
    <!-- EndScriptNavBar -->
  </body>
</html>