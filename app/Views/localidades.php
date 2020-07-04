<?php $this->extend("layouts/general"); ?>

<?php $this->section('head'); ?>
    <title><?=$title?></title>
    <!--datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css"/>
<?php $this->endSection(); ?>

<?php $this->section('contenido') ?>
    <div class="content-wrapper" id="index">
        <div class="container-fluid">
            <div class="text-left pt-3 pl-3">
                <!-- boton activa modal -->
                <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="$('#agregarLocalidad').trigger('reset');">NUEVA LOCALIDAD</button>
            </div><br>
            <section class="col-s-12 col-md-12">
                <div id="tabla" class="col-s-12">
                    <table id="tabla-localidades" class="tabla-localidades"></table>
                </div>
            </section>
            <!-- Modal de Localidades -->
            <!-- Modal -->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="agregarLocalidad" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Localidad</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="localidad">Nombre</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="localidad">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('footer') ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script>
        //Eliminar Localidades
        const eliminarLocalidad = function(codigo) {
            const formData = new FormData()
            formData.append('handler', 'delete')
            formData.append('codigo', codigo)
            fetch('./consultas.php', {
                method: 'post',
                body: formData
            })
            .then(response => response.json())
            .then(response => {
                console.log(response)
                cargaLocalidades()
            })
            .catch(error => console.log(error))
        }

        const crearDataTable = function(response) {
            let data = []
            for(result in response){
                //console.log(Object.values(response[result]))
                data.push(Object.values(response[result]))
            }
            //console.log(data)
            const table = $('#tabla-localidades').DataTable({
                colReorder: true,
                responsive: true,
                data: data,
                columns: [
                    { title: "Localidad" },
                    { "defaultContent": "<button class='btn btn-editar'>Editar</button>" },
                    { "defaultContent": "<button class='btn btn-eliminar'>Eliminar</button>" }
                ]
            })
            //Editar Localidades
            const editar = function(tbody, table){
                $(tbody).on("click","button.btn-editar", function(){
                    if(table.row(this).child.isShown()){
                        var data = table.row(this).data();
                    }else{
                        var data = table.row($(this).parents("tr")).data();
                    }
                    $('#modal [name="id"]').val(data[0]);
                    $('#modal [name="localidad"]').val(data[1]);
                    $('#modal').modal('show')
                    $("#nombre").focus();
                })
            }
            const eliminar = function(tbody, table){
                $(tbody).on("click","button.btn-eliminar", function(){
                    if(table.row(this).child.isShown()){
                        var data = table.row(this).data();
                    }else{
                        var data = table.row($(this).parents("tr")).data();
                    }
                    let confirmar = confirm(`Seguro desea eliminar la localidad ${data[1]}`)
                    if (confirmar){
                        //console.log('elimina'+data[0])
                        const codigo = data[0]
                        eliminarLocalidad(codigo)
                    }
                })
            }
            editar("#tabla-localidades tbody", table)
            eliminar("#tabla-localidades tbody", table)
        }

        //cargar los datos de localidades mediante fetch y datatable
        function cargaLocalidades(){
            //div de la tabla
            const divTabla = document.getElementById('tabla')
            divTabla.innerHTML=''
            tabla = document.createElement('table')
            tabla.setAttribute('id', 'tabla-localidades')
            tabla.setAttribute('class', 'tabla-localidades')
            divTabla.appendChild(tabla)
            const data = new FormData();
            data.append('handler', 'get')
            let respuesta = fetch('./consultas.php', {
                method: 'post',
                body: data,
            })
            .then(response => response.json())
            .then(response => { crearDataTable(response) })
        }

        //agregar localidad por el modal
        const formAgregarLocalidad = document.getElementById('agregarLocalidad')
        formAgregarLocalidad.addEventListener('submit', function (e){
            e.preventDefault()
            const formData = new FormData(this)
            if ($('#modal [name="codigo"]').val() != '') {
                let codigo = ($('#modal [name="codigo"]').val())
                formData.append('codigo', codigo)
                formData.append('handler', 'update')
            }else{
                formData.append('handler', 'set')
            }
            fetch('./consultas.php', {
                method: 'post',
                body: formData
            })
            .then(response => response.json())
            .then(response => {
                console.log(response)
                formAgregarLocalidad.reset()
                $('#modal').modal('hide')
                cargaLocalidades()
            })
            .catch(error => console.log(error))
        })

        //inicializa la tabla de localidades
        cargaLocalidades()
    </script>
<?php $this->endSection(); ?>