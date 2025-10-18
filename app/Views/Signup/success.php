<?= $this->extend('layouts/bienvenida') ?>

<?= $this->section('title') ?>Signup<?= $this->endSection() ?>

<?= $this->section('content') ?>


<h1>Registro completado.</h1>
<h4>Revise su correo para activar el usuario.</h4>
<a href="<?= site_url("/") ?>" class="link-back">Volver al inicio</a>




<?= $this->endSection() ?>