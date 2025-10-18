<?= $this->extend('layouts/bienvenida') ?>

<?= $this->section('title') ?>Task<?= $this->endSection() ?>

<?= $this->section('content2') ?>

<div class="task-detail-container">
    <div class="task-header">
        <a href="<?= site_url("/tasks") ?>" class="back-link">
            <span class="back-arrow">←</span> Volver a tareas
        </a>
    </div>

    <div class="task-card">
        <div class="task-title-section">
            <h1>📝 Detalle de la Tarea</h1>
        </div>

        <div class="task-info">
            <div class="info-row">
                <div class="info-label">
                    <span class="info-icon">🔢</span>
                    ID
                </div>
                <div class="info-value"><?= $task->id ?></div>
            </div>

            <div class="info-row highlight">
                <div class="info-label">
                    <span class="info-icon">📋</span>
                    Descripción
                </div>
                <div class="info-value description"><?= esc($task->description) ?></div>
            </div>

            <div class="info-row">
                <div class="info-label">
                    <span class="info-icon">📅</span>
                    Creada
                </div>
                <div class="info-value"><?= $task->created_at ?></div>
            </div>

            <div class="info-row">
                <div class="info-label">
                    <span class="info-icon">🔄</span>
                    Actualizada
                </div>
                <div class="info-value"><?= $task->updated_at ?></div>
            </div>
        </div>

        <div class="task-actions">
            <a href="<?= site_url('/tasks/edit/' . $task->id) ?>" class="btn-action btn-edit">
                <span class="action-icon">✏️</span>
                Editar
            </a>
            <a href="<?= site_url('/tasks/delete/' . $task->id) ?>" class="btn-action btn-delete">
                <span class="action-icon">🗑️</span>
                Eliminar
            </a>
        </div>
    </div>
</div>

<style>
    .task-detail-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .task-header {
        margin-bottom: 25px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 20px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .back-link:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateX(-5px);
    }

    .back-arrow {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .task-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .task-title-section {
        text-align: center;
        margin-bottom: 35px;
        padding-bottom: 25px;
        border-bottom: 2px solid #f0f0f0;
    }

    .task-title-section h1 {
        font-size: 2rem;
        margin: 0;
    }

    .task-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 35px;
    }

    .info-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 20px;
        padding: 18px;
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s ease;
        align-items: center;
    }

    .info-row:hover {
        background: #f0f2f5;
        transform: translateX(3px);
    }

    .info-row.highlight {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-left: 4px solid #667eea;
    }

    .info-row.highlight:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        color: #555;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-icon {
        font-size: 1.3rem;
    }

    .info-value {
        color: #333;
        font-size: 1.05rem;
        font-weight: 500;
        word-break: break-word;
    }

    .info-value.description {
        font-size: 1.15rem;
        color: #667eea;
        font-weight: 600;
        line-height: 1.5;
    }

    .task-actions {
        display: flex;
        gap: 15px;
        padding-top: 25px;
        border-top: 2px solid #f0f0f0;
    }

    .btn-action {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 25px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .action-icon {
        font-size: 1.3rem;
    }

    .btn-edit {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-edit:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, #f5576c, #e94057);
        color: white;
        box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
    }

    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
    }

    .btn-action:active {
        transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .task-card {
            padding: 25px;
        }

        .task-title-section h1 {
            font-size: 1.5rem;
        }

        .info-row {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .info-label {
            padding-bottom: 5px;
        }

        .task-actions {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>

<?= $this->endSection() ?>