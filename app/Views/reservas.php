<?php $this->extend("layouts/general"); ?>

<?php $this->section('head'); ?>
<title>Fase 5 Serendipia</title>

<!-- fullCalendar -->
<link rel="stylesheet" href="<?php echo base_url('public/plugins/fullcalendar/main.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/plugins/fullcalendar-daygrid/main.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/plugins/fullcalendar-timegrid/main.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/plugins/fullcalendar-bootstrap/main.min.css'); ?>">
<?php $this->endSection(); ?>

<?php $this->section('contenido') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row col-md-12">
				<div id="divCalendar" class="front col-md-12">
					<div class="card">
						<div class="card-header">
							<h3>Calendario de Reservas</h3>
						</div>
						<div class="card-body p-0">
							<!-- THE CALENDAR -->
							<div id="calendar"></div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->

			</div>
			<!-- /.row -->
			<!-- /.modal -->
			<div class="modal fade" id="modal">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<!-- Main content -->
							<section class="content">
								<div class="container-fluid">

									<div class="row">
										<div class="col-md-12">
											<!-- general form elements -->
											<div class="card card-primary">
												<div class="card-header">
													<h3 class="card-title">DATOS DE RESERVA</h3>
													<div class="text-right">
													<button type="button" id="eliminar" data-id='' class="btn btn-dark">Eliminar</button>
													</div>
												</div>
												<!-- /.card-header -->
												<!-- form start -->
												<?php
													$attributes = ['role' => 'form', 
													'id' => 'reserva', 
													'enctype'=>'multipart/form-data'
												];
													echo form_open('eventos/ingresar', $attributes);?>
												<!--<form role="form" action="<?php //echo base_url()."musicos/ingresar"; ?>" method="POST">-->
												<div class="card-body">
													<div class="row">
													<div class="form-group col-md-2">
															<?php 
																	$attributes = [
																		'name'          => 'fecha',
																		'class'         => 'form-control',
																		'id'            => 'fecha',
																		'type'          => 'date'
																	];                          
																	echo form_label('Fecha', 'fecha');
																	echo form_input($attributes);
																	?>
														</div>
														<div class="form-group col-md-6 col-12">
															<?php
																$attributes = [
																	'name'                      => 'turno',
																	'class'                     => 'form-control',
																	'id'                        => 'turno',
																	'style'                     => 'width: 100%;'
																	];       
																	$options = array();       
																	foreach ($turno as $key => $value):
																	$options[$value->id] = "Turno Nº". $value->turno." Desde: ".$value->hora_desde." Hasta: ".$value->hora_hasta;              
																	endforeach;                       
																	echo form_label('Turno', 'turno');
																	echo form_dropdown($attributes, $options);
																?>
														</div>
														<div class="col-md-2">
																<?php 
																$attributes = [
																	'name'    => 'reservas',
																	'class'   => 'form-control',
																	'id'      => 'reservas',
																	'placeholder' => 'Cantidad',
																	'type'	  => 'number'
																];                 
																$options = array();       
																for ($i=0;$i<$turno[0]->capacidad; $i++){
																	$options[$i+1] = $i+1;  
																}            
																echo form_label('Reservas', 'reservas');
																echo form_dropdown($attributes, $options);
																?>
														</div>
														<div class="form-group col-md-2 col-12">
															<?php 
																$attributes = [
																	'name'=>'estado',
																	'class'=>'form-control',
																	'id'=>'estado',
																	'style'=>'width: 100%'
																];       
																$options = array();       
																foreach ($estado as $key => $value):
																$options[$value->id] = $value->id;              
																endforeach;               
																echo form_label('Estado', 'estado');
																echo form_dropdown($attributes, $options);
															?>
														</div>

													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<?php 
																	$attributes = [
																		'name'          => 'nombre',
																		'class'         => 'form-control',
																		'id'            => 'nombre',
																		'placeholder'   => 'Nombre',
																		'type'          => 'text'
																	];                          
																	echo form_label('Nombre', 'nombre');
																	echo form_input($attributes);
																	?>
														</div>
														<div class="form-group col-md-4">
															<?php 
																	$attributes = [
																		'name'          =>'apellido',
																		'class'         =>'form-control',
																		'id'            =>'apellido',
																		'placeholder'   =>'Apellido',
																		'type'          =>'text'
																	];                          
																	echo form_label('Apellido', 'apellido');
																	echo form_input($attributes);
																	?>
														</div>
													</div>
													<div class="row">
													<div class="form-group col-md-3">
																		<?php 
																		$attributes = [
																			'name'                      => 'dni',
																			'class'                     => 'form-control',
																			'placeholder'         		=> 'DNI',
																			'id'                        => 'dni',
																			'type'						=> 'text'
																			];                
																			echo form_label('Dni', 'dni');
																			echo form_input($attributes);
																		?>
													</div>
													<div class="col-md-5">
																<?php 
																$attributes = [
																	'name'    => 'celular',
																	'class'   => 'form-control',
																	'id'      => 'celular',
																	'placeholder' => 'Telefono',
																	'type'	  => 'text'
																];                 
																echo form_label('Telefono', 'celular');
																echo form_input($attributes);
																
																?>
													</div>
													</div>
													
													<!-- end of row -->
												</div>
												<!-- /.card-body -->
											</div>
											<!-- /.card -->
										</div>
									</div>
									<!-- /.row -->
							</section>
							<!-- /.content -->
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary" id="guardar"
								name="calendar/ingresar">Guardar</button>
							<?php echo form_close(); ?>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->endSection(); ?>

<?php $this->section('footer') ?>

<!-- jQuery UI -->
<script src="<?php echo base_url('public/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('public/plugins/fullcalendar/main.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/fullcalendar-daygrid/main.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/fullcalendar-timegrid/main.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/fullcalendar-interaction/main.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/fullcalendar-bootstrap/main.min.js'); ?>"></script>
<script src='<?php echo base_url('public/plugins/fullcalendar/locales/es.js'); ?>'></script>
<script src='<?php echo base_url('public/plugins/fullcalendar-jquery-ui/jquery-ui.custom.min.js'); ?>'></script>
<script src='<?php echo base_url('public/plugins/moment/moment.min.js'); ?>'></script>





<script>
	<?php 
	echo "console.log('".$_SERVER['HTTP_HOST']."')";
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		$urlRelativa = '../proyectos/Serendipia/gitFase5';
	}
	else {
		$urlRelativa = '../';
	}
	?>
	//Full Calendar
	//Date for the calendar events (dummy data)
	var date = new Date()
	var d = date.getDate(),
		m = date.getMonth(),
		y = date.getFullYear()
	var Calendar = FullCalendar.Calendar;
	var Draggable = FullCalendarInteraction.Draggable;

	var containerEl = document.getElementById('external-events');
	var checkbox = document.getElementById('drop-remove');
	var calendarEl = document.getElementById('calendar');

	const traerEventos = async function(){
		//server url ../reservas/eliminarReserva
		//local url ../proyectos/Serendipia/gitFase5/reservas/traerEventos
		 let response = await fetch('<?= base_url("$urlRelativa/reservas/traerEventos")?>',{
			method: 'post',
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			}
		});
  		let result = await response.json();
		  console.log(result)
		return result

	}

	var calendar = new Calendar(calendarEl, {
		height: 550,
		locale: 'es',
		plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay'
		},
		eventClick: function(info){
			mostrarModal(info.event)
		},
		display: 'background',
		events: traerEventos,
		defaultView: 'dayGridMonth',
		selectable: true,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function (info) {
			// is the "remove after drop" checkbox checked?
			if (checkbox.checked) {
				// if so, remove the element from the "Draggable Events" list
				info.draggedEl.parentNode.removeChild(info.draggedEl);
			}
		},
		select: function (info) {
			console.log(info)
			mostrarModal(info)
		}
	})
	calendar.render()

	

	const eliminarElemento = function(id){
		elemento = document.getElementById(id);	
		if (!elemento){
			
		} else {
			padre = elemento.parentNode;
			padre.removeChild(elemento);
		}
	}


	const mostrarModal = function(info){
		$('#modal').modal('show')
		let hoy=''
		const id = info.id	
		eliminarElemento('inputId')
		const formulario = document.getElementById('reserva')
		let btnEliminar = document.getElementById('eliminar')
		formulario.reset()
		if(id == null){
			startStr = info.startStr
			startStr = startStr.substr(0,10)
			hoy = startStr
			btnEliminar.setAttribute('hidden', 'hidden')
			btnEliminar.removeAttribute('data-id')
		} else{
			hoy = info.extendedProps.startStr
			const inputId = document.createElement('input')
			inputId.setAttribute('type', 'text')
			inputId.setAttribute('name', 'inputId')
			inputId.setAttribute('id', 'inputId')
			inputId.setAttribute('disabled', 'disabled')
			inputId.value = id
			inputId.setAttribute('hidden', 'hidden')
			btnEliminar.removeAttribute('hidden')
			btnEliminar.setAttribute('data-id', id)

			//inputId.setAttribute('display', 'none')
			//formulario = document.getElementById('reserva')
			formulario.append(inputId)
			let turno    = document.getElementById('turno').value 	 = info.extendedProps.turno
			let reservas = document.getElementById('reservas').value = info.extendedProps.reservas
			let estado   = document.getElementById('estado').value 	 = info.extendedProps.estado
			let nombre 	 = document.getElementById('nombre').value 	 = info.extendedProps.nombre
			let apellido = document.getElementById('apellido').value = info.extendedProps.apellido
			let dni 	 = document.getElementById('dni').value 	 = info.extendedProps.dni
			let celular  = document.getElementById('celular').value  = info.extendedProps.celular
		}

		let fecha 	 = document.getElementById('fecha').value = hoy
	}
	//agrega o edita reservas
	const agregarReserva = function () {
		const reserva = document.getElementById('reserva')
		const formData = new FormData(reserva)
		const inputId = document.getElementById('inputId')
		console.log(inputId)
		if (inputId) {
			formData.append('inputId', inputId.value)
		}
		fetch("<?php echo base_url("$urlRelativa/reservas/agregarReserva"); ?>", {
				method: 'post',
				body: formData,
				headers: {
					"X-Requested-With": "XMLHttpRequest"
				}
			})
			.then(function (response) {
				return response.json();
			})
			.then(async function (response) {
				console.log(response);
				$('#modal').modal('hide')
				let eventos = await traerEventos();
				calendar.removeAllEvents()
				await eventos.forEach(element => {
					calendar.addEvent(element)
				});
			});
			

			
	}

	//Eliminar Reserva
	const eliminarReserva = async function(id){
		let response = await fetch('<?= base_url("$urlRelativa/reservas/eliminarReserva")?>/'+id,{
			method: 'post',
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			}
		});
  		let result = await response.json();
		$('#modal').modal('hide')
		let eventos = await traerEventos();
		calendar.removeAllEvents()
		await eventos.forEach(element => {
			calendar.addEvent(element)
		});  
		console.log(result)
	}
	//boton Guardar 
	const guardar = document.getElementById('guardar')														
	guardar.addEventListener('click', function(e){
		e.preventDefault()
		agregarReserva()
	})

	//boton Eliminar
	const eliminar = document.getElementById('eliminar')
	eliminar.addEventListener('click', function(e){
		e.preventDefault()
		let confirmar = confirm('Seguro desea eliminar el elemento?')
		if (confirmar) {
			id = eliminar.getAttribute('data-id')
			eliminarReserva(id)
			alert('eliminado')
		}

	})
</script>


<?php $this->endSection(); ?>