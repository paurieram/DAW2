<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    <title>Laravel</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Números</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/traductor/en">Números en inglés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/traductor/de">Números en alemán</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/traductor/it">Números en italiano</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/analisis">Analizar número</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/calculadora">Calculadora</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <h1 class="text-center mt-5 mb-5 bg-secondary rounded" style="margin: 0 20% 0 20%">@yield('title')</h1>
    <section class="container">
        <div class="offset-4 col-3">
            @section('content')
            @show
        </div>
    </section>

  </body>
</html>