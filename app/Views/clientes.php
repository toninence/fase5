<?php $this->extend("layouts/general"); ?>

<?php $this->section('head'); ?>
    <title><?=$title?></title>
<?php $this->endSection(); ?>

<?php $this->section('contenido') ?>
    <div class="content-wrapper">
        <?=$pagina?>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('footer') ?>
<?php $this->endSection(); ?>