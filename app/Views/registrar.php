<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 mt-5 py-3 bg-white from-wrapper">
            <div class="container">
                <h3>¡Comencemos el registro!</h3>
                <hr>
                <form class="mb-5" action="./registrar" method="post">
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
                                <label for="email">Email</label>
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
                                <label for="password_confirm">Repetí tu contraseña</label>
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
                        <div class="col">
                            <p>Al registrarme acepto haber leído y estar de acuerdo con las <a href="#">condiciones de uso y política de privacidad.</a></p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-success">Registrarme</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/login">Ya tengo una cuenta.</a>
                        </div>
                    </div>
                </form>
                <div class="alert alert-success" role="alert">
                    Completa tus datos y comenzá la prueba gratuita.
                </div>
            </div>
        </div>
    </div>
</div>