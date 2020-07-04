<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fase 5 | Serendipia</title>
		<link rel="icon" type="image/png" href="<?= base_url('public/assets/img/favicon.ico')?>"/>
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/bootstrap/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/animate/animate.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/css-hamburgers/hamburgers.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/animsition/css/animsition.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/select2/select2.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/daterangepicker/daterangepicker.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/dist/css/login/util.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/dist/css/login/main.css')?>">
	</head>
	<body>
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
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form action="<?=base_url("auth/login")?>" method="POST" class="login100-form validate-form">
						<span class="login100-form-title p-b-34">
							Ingreso
						</span><div class="row">
						<?php if (session()->getFlashdata('error')): ?>
							<div class="alert alert-danger col-md-12 col-12">
							<p><?=session()->getFlashdata('error')?></p>
							</div>
						<?php endif; ?>
						<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
							<input id="first-name" class="input100" type="text" name="usuario" placeholder="Correo electrónico">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
							<input class="input100" type="password" name="password" placeholder="Contraseña">
							<span class="focus-input100"></span>
						</div>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
							INGRESAR
							</button>
						</div>
						<div class="w-full text-center p-t-27 p-b-239">
							<span class="txt1">
								¿Olvidaste 
							</span>
							<a href="/recupero" class="txt2">
								tus datos de acceso?
							</a>
						</div>
						<div class="w-full text-center">
							<a href="/registrar" class="txt3">
								REGISTRATE GRATIS PARA PROBAR EL SISTEMA
							</a>
							<br>Tenemos en cuenta todo lo socilitado por la Municipalidad de La Costa para reunir la información de los clientes en esta quinta fase.
						</div>
					</form>
					<div class="login100-more" style="background-image: url('<?= base_url('public/dist/img/principal.png')?>') "></div>
					<a href="/"></a>
				</div>
			</div>
		</div>
		<div id="dropDownSelect1"></div>
		<script src="<?= base_url('public/plugins/jquery/jquery-3.2.1.min.js')?>"></script>
		<script src="<?= base_url('public/plugins/animsition/js/animsition.min.js')?>"></script>
		<script src="<?= base_url('public/plugins/bootstrap/js/popper.js')?>"></script>
		<script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?= base_url('public/plugins/select2/select2.min.js')?>"></script>
		<script>
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
		</script>
		<script src="<?= base_url('public/plugins/daterangepicker/moment.min.js')?>"></script>
		<script src="<?= base_url('public/plugins/daterangepicker/daterangepicker.js')?>"></script>
		<script src="<?= base_url('public/plugins/countdowntime/countdowntime.js')?>"></script>
		<script src="<?= base_url('public/dist/js/login/main.js')?>"></script>
	</body>
</html>