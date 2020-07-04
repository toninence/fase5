<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FASE 5 | Serendipia</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=base_url('public/assets/css/style.css')?>">
        <script src="https://kit.fontawesome.com/fa0cbd05f5.js" crossorigin="anonymous"></script>
         <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body class="fondo">
        <?php
            $uri = service('uri');
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/"><img height="40" src="<?=base_url('public/assets/img/navbar-logo.png')?>" alt="FASE 5"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav my-2 my-lg-0"> 
                        <li class="nav-item <?= ($uri->getSegment(1)== 'login' ? 'active' : null) ?>">
                            <a class="btn btn-outline-success" href="/login">Ingreso</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1)== 'registrar' ? 'active' : null) ?>">
                            <a class="nav-link" href="/registrar">Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>