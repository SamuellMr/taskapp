<?= $this->extend("layouts/bienvenida") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

    
        <h1>¡Bienvenido!</h1>

        <?php if (!current_user()){ ?>
        <p>Selecciona una opción para continuar</p>
        

        <div class="button-container">
            <a href="<?= site_url("/") ?>"><button class="btn-home">Home</button></a>
            <a href="<?= site_url("/signup") ?>"><button class="btn-signup" >Sign up</button></a> 
            <a href="<?= site_url("/login") ?>"><button class="btn-login">Login</button></a>
            
        </div>
        <?php } ?>
    
<?= $this->endSection() ?>