<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Paises</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Cataleg</a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/producto">Listat de productes</a>
                        <a class="nav-link" href="/categoria">llistat de categories</a>
                        <!-- <a class="nav-link" href="/paises">Paises</a>
                        <a class="nav-link" href="/paises/create">Nuevo país</a> -->
                    </div>
                </div>
            </div>
        </nav>
            <div class="col-6 offset-3">
        <div class="container my-5 bg-secondary text-light rounded">
                <h1>@yield('titulo')</h1>
            </div>
        </div>
        <div class="container-fluid px-5">
            @section('contenido')
            @show
        </div>
    </body>
</html>
