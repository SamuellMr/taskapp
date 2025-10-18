<?= $this->extend('layouts/bienvenida') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>


    <h1>Iniciar Sesión</h1>
    <p>Ingresa tus credenciales para continuar</p>

    <?= form_open("/login/create") ?>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn-submit">Iniciar Sesión</button>
        
        <div class="form-footer">
            <p>¿No tienes cuenta? <a href="<?= site_url("/signup") ?>">Regístrate aquí</a></p>
            <a href="<?= site_url("/") ?>" class="link-back">Volver al inicio</a>
        </div>

    </form>


<?= $this->endSection() ?>