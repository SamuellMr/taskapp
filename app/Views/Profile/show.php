<?= $this->extend('layouts/bienvenida') ?>

<?= $this->section('title') ?>Profile<?= $this->endSection() ?>

<?= $this->section('content2') ?>

<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h1>👤 Mi Perfil</h1>
        </div>

        <div class="profile-content">
            <!-- Sección de Imagen -->
            <div class="profile-image-section">
                <div class="image-wrapper">
                    <?php if ($user->profile_image): ?>
                        <img src="<?= site_url('/profile/image') ?>" class="profile-image" alt="Imagen de perfil">
                        <div class="image-badge">✓</div>
                    <?php else: ?>
                        <img src="<?= base_url('images/prueba.png') ?>" class="profile-image default" alt="Imagen de perfil por defecto">
                        <div class="image-badge default">📷</div>
                    <?php endif; ?>
                </div>

                <?php if ($user->profile_image): ?>
                    <a href="<?= site_url('/profileimage/delete') ?>" class="btn-delete-image">
                        <span class="icon">🗑️</span> Eliminar foto
                    </a>
                <?php endif; ?>
            </div>

            <!-- Sección de Información -->
            <div class="profile-info-section">
                <div class="info-card">
                    <div class="info-item">
                        <div class="info-icon">👤</div>
                        <div class="info-content">
                            <div class="info-label">Nombre</div>
                            <div class="info-value"><?= esc($user->name) ?></div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📧</div>
                        <div class="info-content">
                            <div class="info-label">Email</div>
                            <div class="info-value"><?= esc($user->email) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Acciones -->
        <div class="profile-actions">
            <a href="<?= site_url("/profile/edit") ?>" class="btn-profile btn-primary">
                <span class="btn-icon">✏️</span>
                <span class="btn-text">Editar Perfil</span>
            </a>

            <a href="<?= site_url("/profile/editpassword") ?>" class="btn-profile btn-secondary">
                <span class="btn-icon">🔒</span>
                <span class="btn-text">Cambiar Contraseña</span>
            </a>

            <a href="<?= site_url("/profileimage/edit") ?>" class="btn-profile btn-tertiary">
                <span class="btn-icon">📸</span>
                <span class="btn-text">Cambiar Foto</span>
            </a>
        </div>
    </div>
</div>

<style>
    .profile-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 25px;
        border-bottom: 2px solid #f0f0f0;
    }

    .profile-header h1 {
        font-size: 2.2rem;
        margin: 0;
    }

    .profile-content {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 40px;
        margin-bottom: 40px;
    }

    /* Sección de Imagen */
    .profile-image-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .image-wrapper {
        position: relative;
        width: 200px;
        height: 200px;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #667eea;
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .profile-image.default {
        border-color: #ddd;
        opacity: 0.8;
    }

    .profile-image:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.4);
    }

    .image-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .image-badge.default {
        background: #ddd;
    }

    .btn-delete-image {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: #fee;
        color: #c33;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        border: 2px solid #fcc;
    }

    .btn-delete-image:hover {
        background: #fdd;
        border-color: #fbb;
        transform: translateY(-2px);
    }

    .btn-delete-image .icon {
        font-size: 1.1rem;
    }

    /* Sección de Información */
    .profile-info-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .info-card {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 20px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        border-radius: 15px;
        border-left: 4px solid #667eea;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        transform: translateX(5px);
    }

    .info-icon {
        font-size: 2rem;
        min-width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .info-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .info-label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #667eea;
        letter-spacing: 1px;
    }

    .info-value {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        word-break: break-word;
    }

    /* Sección de Acciones */
    .profile-actions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        padding-top: 30px;
        border-top: 2px solid #f0f0f0;
    }

    .btn-profile {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        padding: 20px 15px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-icon {
        font-size: 2rem;
    }

    .btn-text {
        font-size: 0.95rem;
        letter-spacing: 0.3px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        color: white;
        box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
    }

    .btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
    }

    .btn-tertiary {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        color: white;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .btn-tertiary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
    }

    .btn-profile:active {
        transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-card {
            padding: 25px;
        }

        .profile-header h1 {
            font-size: 1.7rem;
        }

        .profile-content {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .image-wrapper {
            width: 180px;
            height: 180px;
        }

        .profile-actions {
            grid-template-columns: 1fr;
        }

        .btn-profile {
            flex-direction: row;
            justify-content: center;
            padding: 15px 20px;
        }

        .info-value {
            font-size: 1.1rem;
        }
    }
</style>

<?= $this->endSection() ?>