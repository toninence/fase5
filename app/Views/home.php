<?php $this->extend("layouts/general"); ?>

<?php $this->section('head'); ?>
<title>Fase 5 Serendipia</title>

<!-- fullCalendar -->
<link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar/main.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar-daygrid/main.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar-timegrid/main.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar-bootstrap/main.min.css'); ?>">
<?php $this->endSection(); ?>

<?php $this->section('contenido') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<!--<div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div>-->
			<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row col-md-12">
				<div id="divCalendar" class="front col-md-12">
					<div class="card">
						<div class="card-header">
							<button id="agregar" class="btn btn-primary">Agregar Evento</button>
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
													<h3 class="card-title">DATOS</h3>
												</div>
												<!-- /.card-header -->
												<!-- form start -->
												<?php
                        $attributes = ['role' => 'form', 
                        'id' => 'datos', 
                        'enctype'=>'multipart/form-data'
                      ];
                        echo form_open('eventos/ingresar', $attributes);?>
												<!--<form role="form" action="<?php //echo base_url()."musicos/ingresar"; ?>" method="POST">-->
												<div class="card-body">
													<div class="row">
														<div class="form-group col-md-12">
															<div class="select2-purple">
																<?php
                              $attributes = [
                                  'name'                      => 'musicos[]',
                                  'class'                     => 'select2bs4',
                                  'data-placeholder'          => 'Seleccione Los Musicos',
                                  'data-dropdown-css-class'   => 'select2-purple',
                                  'style'                     => 'width: 100%',
                                  'multiple'                  => 'multiple',
                                  'id'                        => 'musicos',
                                  'style'                     => 'width: 100%;'
                                ];       
                                $options = array();       
                                /* foreach ($musicos as $key => $value):
                                $options[$value->id_musico] = $value->nombres." ".$value->apellidos;              
                                endforeach;  */                     
                                echo form_label('Musicos', 'musicos');
                                echo form_dropdown($attributes, $options);
                            ?>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8">
															<div class="row">
																<div class="form-group col-md-6">
																	<?php 
                                  $attributes = [
                                    'name'=>'barco',
                                    'class'=>'form-control select2bs4',
                                    'id'=>'barco',
                                    'style'=>'width: 100%'
                                  ];       
                                  $options = array();       
                                  /* foreach ($barcos as $key => $value):
                                  $options[$value->id_barco] = $value->nombre;              
                                  endforeach;    */                   
                                  echo form_label('Barco', 'barco');
                                  echo form_dropdown($attributes, $options);
                                ?>
																</div>
																<div class="form-group col-md-6">
																	<div class="select2-purple">
																		<?php 
                                  $attributes = [
                                      'name'                      => 'charter',
                                      'class'                     => 'form-control select2bs4',
                                      'data-placeholder'          => 'Seleccione Charter',
                                      'id'                        => 'charter',
                                      'style'                     => 'width: 100%;'
                                    ];       
                                    $options = array();       
                                    /* foreach ($charter as $key => $value):
                                    $options[$value->id_charter] = $value->nombre." Clientes: ".$value->clientes;              
                                    endforeach;  */                     
                                    echo form_label('Charter', 'charter');
                                    echo form_dropdown($attributes, $options);
                                ?>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group col-md-6">
																	<?php 
                              $attributes = [
                                'name'          => 'fecha_inicio',
                                'class'         => 'form-control',
                                'id'            => 'fecha_inicio',
                                'placeholder'   => 'Fecha de Inicio',
                                'type'          => 'date'
                              ];                          
                              echo form_label('Fecha De Inicio', 'fecha_inicio');
                              echo form_input($attributes);
                            ?></div>
																<div class="form-group col-md-6">
																	<?php 
                              $attributes = [
                                'name'          =>'fecha_fin',
                                'class'         =>'form-control',
                                'id'            =>'fecha_fin',
                                'placeholder'   =>'Fecha de Fin',
                                'type'          =>'date'
                              ];                          
                              echo form_label('Fecha Fin', 'fecha_fin');
                              echo form_input($attributes);
                            ?></div>
															</div>
														</div>

														<div class="col-md-4">
															<div class="input-group">
																<?php 
                              $attributes = [
                                'name'    => 'observaciones',
                                'class'   => 'form-control',
                                'id'      => 'observaciones',
                                'style'   => 'width: 100%',
                                'rows'    => 4
                              ];                 
                              echo form_label('Observaciones', 'observaciones');
                              echo form_textarea($attributes);
                              
                            ?>
															</div>
														</div>
													</div>
													<!-- end of row -->
													<div class="row">
														<div class="form-group col-md-12">
															<div class="form-group">
																<?php 
                              $attributes = [
                                'name'    => 'itinerario',
                                'class'   => 'form-control',
                                'id'      => 'itinerario',
                                'style'   => 'width: 100%',
                                'rows'    => 2
                              ];                 
                              echo form_label('Itinerario', 'itinerario');
                              echo form_textarea($attributes);
                            ?>
															</div>
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
							<button type="submit" class="btn btn-primary" id="ingresar"
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
<script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('plugins/fullcalendar/main.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/fullcalendar-daygrid/main.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/fullcalendar-timegrid/main.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/fullcalendar-interaction/main.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/fullcalendar-bootstrap/main.min.js'); ?>"></script>
<script src='<?php echo base_url('plugins/fullcalendar/locales/es.js'); ?>'></script>
<script src='<?php echo base_url('plugins/moment/moment.min.js'); ?>'></script>



<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>

<script>

	//Full Calendar
	//Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
	var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

	var calendar = new Calendar(calendarEl, {
		locale: 'es',
		plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
		header    : {
			left  : 'prev,next today',
			center: 'title',
			right : 'dayGridMonth,timeGridWeek,timeGridDay'
		},
		events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y,m,28),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        }
		],
		defaultView: 'dayGridWeek',
		selectable: true,
		editable  : true,
		droppable : true, // this allows things to be dropped onto the calendar !!!
		drop      : function(info) {
			// is the "remove after drop" checkbox checked?
			if (checkbox.checked) {
			// if so, remove the element from the "Draggable Events" list
			info.draggedEl.parentNode.removeChild(info.draggedEl);
			}
		},
		select: function(info) {
			$('#modal').modal('show')
			
			const nombre = prompt('Nombre')
			info['nombre'] = nombre 
			agregarReserva(info)
			//alert(nombre +' Clicked on: ' + info.start.getHours() + ':' + info.start.getMinutes());
			/* alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
			alert('Current view: ' + info.view.type); */
			// change the day's background color just for fun
			/*info.dayEl.style.backgroundColor = 'red'; */
		}
	})
	calendar.render()

	const agregarReserva = function(info){
    //Datos traidos en info
    //allDay: true
    /* 
    end: Date Wed Jun 24 2020 00:00:00 GMT-0300 (hora estándar de Argentina)
    ​
    endStr: "2020-06-24"
    ​
    jsEvent: mouseup { target: td.fc-highlight
    , clientX: 528, clientY: 322, … }
    ​
    nombre: "gastr"
    ​
    start: Date Tue Jun 23 2020 00:00:00 GMT-0300 (hora estándar de Argentina)
    ​
    startStr: "2020-06-23"
    ​
    view: Object { uid: "2", context: {…}, isRtl: false, … }
	​ */ 
	const formData = new FormData()
	formData.append('nombre', info.nombre)
	formData.append('apellido', 'ferreyra')
	formData.append('celular', '2246-556300')
	formData.append('reservas', '5')
	formData.append('id_turno', '1')
	formData.append('id_estado', 'activo')

    fetch("<?php echo base_url('home/agregarReserva'); ?>",{
		method: 'post',
		body: formData,
		headers: {
			"X-Requested-With": "XMLHttpRequest"
		}
	})
	.then(function(response) {
		return response.text();
	})
	.then(function(response) {
		console.log(response);
	});
    
}


</script>


<?php $this->endSection(); ?>