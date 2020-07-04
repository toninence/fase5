<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 mt-5 py-3 bg-white from-wrapper">
            <div class="container">
                <h3>Registremos tu negocio</h3>
                <hr>
                <form class="mb-5" action="./comercio" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="razon_social">Razón social</label>
                                <input type="text" class="form-control" name="razon_social" id="razon_social" value="<?= set_value('razon_social') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="cuit">C.U.I.T.</label>
                                <input type="text" class="form-control" name="cuit" id="cuit" value="<?= set_value('cuit') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" value="<?= set_value('direccion') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?= set_value('telefono') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular" value="<?= set_value('celular') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="capacidad">Capacidad</label>
                                <input type="number" class="form-control" name="capacidad" id="capacidad" value="<?= set_value('capacidad') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="text" class="form-control" name="logo" id="logo" value="<?= set_value('logo') ?>">
                            </div>
                        </div>
                        <?php if(isset($validation)): ?>
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>