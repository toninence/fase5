
<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Si ya te registraste, ingresá tus datos</h3>
                <hr>
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?=base_url("auth/login")?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Correo electrónico" class="form-control" name="usuario" id="first-name" value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="">
                    </div>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger col-md-12 col-12">
                        <p><?=session()->getFlashdata('error')?></p>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center">
                            <a href="/recupero">¿Olvidaste tus datos de acceso?</a>
                        </div>
                    </div>
                    <div class="row mt-3 mb-5">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/registrar">Todavía no tengo cuenta.</a>
                        </div>
                    </div>
                    <div class="alert alert-success" role="alert">
                    Tenemos en cuenta todo lo socilitado por la Municipalidad de La Costa para reunir la información de los clientes en esta quinta fase.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>