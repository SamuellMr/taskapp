<?= $this->extend('layouts/bienvenida') ?>

<?= $this->section('title') ?>Signup<?= $this->endSection() ?>

<?= $this->section('content') ?>


    <h1>Crear Cuenta</h1>
    <p>Completa el formulario para registrarte</p>

    <?php if (session()->has('errors')): ?>
        <div class="error-container">
            <ul>
                <?php foreach(session('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>

    <?= form_open("/signup/create") ?>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Repetir Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        
        <button type="submit" class="btn-submit">Registrarse</button>
        
        <div class="form-footer">
            <p>¿Ya tienes cuenta? <a href="<?= site_url("/login") ?>">Inicia sesión aquí</a></p>
            <a href="<?= site_url("/") ?>" class="link-back">Cancelar</a>
        </div>

    </form>


<?= $this->endSection() ?>