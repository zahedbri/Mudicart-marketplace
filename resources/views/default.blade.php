<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config("app.name")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{asset('js/app.js')}}"></script>

</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url('')}}">Dapurpedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline w-50 ml-auto">
            <input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </nav>
        <div class="w-md-25">
          @yield('breadcrumb')
        </div>
        @yield('content')

      </div>
          <footer class="d-block bg-dark">
            <div class="text-center py-2 text-light">
              Dapurpedia &copy; 2019
            </div>
          </footer>
</body>
</html>