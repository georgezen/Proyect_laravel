<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap_simplex.css') }}">

    
    <script src="{{ asset('dist/js/bootstrap.js') }}"></script>

</head>

<body>


    
      
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            
                <a class="navbar-brand" href="#"> <img src="{{asset('img/logo2.png')}}" alt="" srcset="" class="img-fluid" width="75px" height="75px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            
           
                <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav ms-auto derecha">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Home
                          <span class="visually-hidden">(current)</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </li>
                    </ul>
                  
                  </div>
           
          
      
          
        </div>
      </nav>
        <div class="row">
            <div class="col-md-4 rellenado1">
                <h1 class="titulo">{{ $putita }}</h1>
            </div>

        </div>
        

        @foreach ($texto as $text)
            <h2 class="impreso">{{ $text }}</h2>
        @endforeach

        <strong class="importe">{{ $importe }}</strong>

        <input type="button" class="btn btn-success" value="1">


   

</body>

</html>
