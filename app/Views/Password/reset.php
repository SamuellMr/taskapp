<?= $this->extend('layouts/bienvenida') ?>

<?= $this->section('title') ?>Password reset<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Password reset</h1>

<?php if (session()->has('errors')) : ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?= form_open("/password/processreset") ?>

    <input type="hidden" name="token" value="<?= esc($token) ?>">

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?= old('password') ?>">
    </div>
    
    <div>
        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" value="<?= old('password_confirmation') ?>">
    </div>
    
    <button>Reset password</button>

<?= form_close() ?>

<?= $this->endSection() ?>