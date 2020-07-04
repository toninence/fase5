<?php $this->extend('layouts/general'); ?>
<?= $this->section('contenido') ?>
<div class="content-wrapper">
    <div class="container pt-3" style="background-color: #f4f6f9;">
        
            <div class="col-12 col-md-12 py-3 bg-white from-wrapper">
                <div class="container">
                    <h3><?= $user->nombre.' '.$user->apellido?></h3>
                    <hr>
                    <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                    <?php endif; ?>
                    <form class="" action="./perfil" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="<?= set_value('nombre', $user->nombre) ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido"
                                        value="<?= set_value('apellido', $user->apellido) ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="text" class="form-control" readonly id="email"
                                        value="<?= $user->email ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="number" class="form-control" name="dni" id="dni"
                                        value="<?= $user->dni ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password_confirm">Confirmar contraseña</label>
                                    <input type="password" class="form-control" name="password_confirm"
                                        id="password_confirm" value="">
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
                        <div class="row">
                            <div class="col-12 col-sm-4 mt-5">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
    <?= $this->endSection() ?>