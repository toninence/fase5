<?php $this->extend("layouts/general"); ?>

<?php $this->section('head'); ?>
    <title><?=$title?></title>
<?php $this->endSection(); ?>

<?php $this->section('contenido') ?>
<div class="content-wrapper">
	<div class="container pt-3" style="background-color: #f4f6f9;">
	<div class="card" style="padding: 15px;">
		<div class="card-header" style="margin-bottom:15px;">
			<div class="col-12 mb-3">
				<a class="btn btn-success btn-md" href="<?= base_url('reservas'); ?>">RESERVAR</a>
				<a class="btn btn-primary btn-md" href="<?= base_url('clientes/add'); ?>">REGISTRAR</a>
				<a class="btn btn-info btn-md" href="#">EMITIR REPORTE</a>
			</div>
		</div>
	
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
				<!--Ficha Comercios-->
				<div class="card bg-light mb-3" style="max-width: 18rem;">
					<div class="card-header">Comercios</div>
					<div class="card-body">
						<h1 class="card-title"><i class="fas fa-store"></i> 1</h1>
						<p class="card-text"></p>
					</div>
					<div class="card-footer bg-transparent border-success">
						<span class="badge badge-pill btn-danger">1</span> Principal.
						<span class="badge badge-pill btn-warning">0</span> Sucursales.
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
				<!--Ficha Empleados-->
				<div class="card bg-light mb-3" style="max-width: 18rem;">
					<div class="card-header">Empleados</div>
					<div class="card-body">
						<h1 class="card-title"><i class="fas fa-user-friends"></i> 5</h1>
						<p class="card-text"></p>
					</div>
					<div class="card-footer bg-transparent border-success">
						<span class="badge badge-pill btn-danger">5</span> Activos.
						<span class="badge badge-pill btn-warning">0</span> Inactivos.
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
				<!--Ficha Empleados-->
				<div class="card bg-light mb-3" style="max-width: 18rem;">
					<div class="card-header">Clientes registrados</div>
					<div class="card-body">
						<h1 class="card-title"><i class="fas fa-users"></i> 3502</h1>
						<p class="card-text"></p>
					</div>
					<div class="card-footer bg-transparent border-success">
						<span class="badge badge-pill btn-danger">3502</span> Sin síntomas.
						<span class="badge badge-pill btn-warning">0</span> Con síntomas.
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
				<!--Ficha Empleados-->
				<div class="card bg-light mb-3" style="max-width: 18rem;">
					<div class="card-header">Mesas</div>
					<div class="card-body">
						<h1 class="card-title"><i class="fas fa-utensils"></i> 10</h1>
						<p class="card-text"></p>
					</div>
					<div class="card-footer bg-transparent border-success">
						<span class="badge badge-pill btn-danger">2</span> Disponibles.
						<span class="badge badge-pill btn-warning">5</span> Capacidad por mesa.
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
				<!--Ficha Empleados-->
				<div class="card bg-light mb-3" style="max-width: 18rem;">
					<div class="card-header">Turnos</div>
					<div class="card-body">
						<h1 class="card-title"><i class="fas fa-hourglass-half"></i> 3</h1>
						<p class="card-text"></p>
					</div>
					<div class="card-footer bg-transparent border-success">
						<span class="badge badge-pill btn-danger">#1</span> 2 Reservas.
						<span class="badge badge-pill btn-warning">#2</span> 0 Reservas.
						<span class="badge badge-pill btn-info">#3</span> 10 Reservas.
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
				<!--Ficha Empleados-->
				<div class="card bg-light mb-3" style="max-width: 18rem;">
					<div class="card-header">Reservas</div>
					<div class="card-body">
						<h1 class="card-title"><i class="far fa-calendar-alt"></i> 2</h1>
						<p class="card-text"></p>
					</div>
					<div class="card-footer bg-transparent border-success">
						<span class="badge badge-pill btn-danger">8</span> Personas.
						<span class="badge badge-pill btn-warning">2</span> Disponibles.
					</div>
				</div>
			</div>

		</div>
		</div>
	</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('footer') ?>
<?php $this->endSection(); ?>