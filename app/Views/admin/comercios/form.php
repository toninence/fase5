<?= $this->extend('layouts/general') ?>
<?= $this->section('contenido') ?>
<div class="content-wrapper">
	<?= view_cell('\App\Libraries\Admin::title', ['title' => @$title]) ?>
    <section class="content">
        <div class="container-fluid">
            <?= $this->include('admin/cmps/alerts') ?>
            <?= $form ?>
        </div>
    </section>
</div>
<?= $this->endSection() ?>