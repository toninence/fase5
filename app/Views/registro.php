<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 mt-5 py-3 bg-white from-wrapper">
            <div class="container">
                <h3>Registro</h3>
                <hr>
                <form class="mb-5" action="/register" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= set_value('nombre') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" value="<?= set_value('apellido') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="number" class="form-control" name="dni" id="dni" value="<?= set_value('dni') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Repetir contraseña</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
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
                    <div class="row mt-5">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/login">Ya tengo una cuenta.</a>
                        </div>
                    </div>
                </form>
                <div class="alert alert-primary" role="alert">
                    Complete sus datos y comience su prueba gratuita.
                </div>
            </div>
        </div>
    </div>
</div>