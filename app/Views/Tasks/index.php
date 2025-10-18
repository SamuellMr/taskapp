<?= $this->extend("layouts/bienvenida") ?>

<?= $this->section("title") ?>Tasks<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <div class="tasks-container">
        <div class="tasks-header">
            <h1>📋 Mis Tareas</h1>
            <a href="<?= site_url("/tasks/new") ?>" class="btn-new-task">
                <span class="plus-icon">+</span> Nueva Tarea
            </a>
        </div>

        <div class="search-container">
            <div class="search-wrapper">
                <span class="search-icon">🔍</span>
                <input 
                    type="text" 
                    name="query" 
                    id="query" 
                    placeholder="Buscar tareas..."
                    autocomplete="off"
                >
            </div>
        </div>

        <?php if ($tasks): ?>
        
            <div class="tasks-list">
                <?php foreach($tasks as $task): ?>
                
                    <a href="<?= site_url("/tasks/show/" . $task->id) ?>" class="task-item">
                        <span class="task-icon">📝</span>
                        <span class="task-description"><?= esc($task->description) ?></span>
                        <span class="task-arrow">→</span>
                    </a>
                    
                <?php endforeach; ?>
            </div>

            <div class="pagination-container">
                <?= $pager->simpleLinks() ?>
            </div>
            
        <?php else: ?>
            
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <p>No se encontraron tareas.</p>
                <a href="<?= site_url("/tasks/new") ?>" class="btn-create-first">Crear mi primera tarea</a>
            </div>
            
        <?php endif; ?>
    </div>

    <style>
        .tasks-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .tasks-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .tasks-header h1 {
            font-size: 2rem;
            margin-bottom: 0;
        }

        .btn-new-task {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-new-task:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .plus-icon {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .search-container {
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            font-size: 1.2rem;
            pointer-events: none;
        }

        .search-wrapper input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .search-wrapper input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .tasks-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 30px;
        }

        .task-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-left: 4px solid transparent;
        }

        .task-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
            border-left-color: #667eea;
            background: white;
        }

        .task-icon {
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .task-description {
            flex: 1;
            font-size: 1.05rem;
            font-weight: 500;
        }

        .task-arrow {
            color: #667eea;
            font-size: 1.2rem;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .task-item:hover .task-arrow {
            opacity: 1;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .empty-state p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 25px;
        }

        .btn-create-first {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-create-first:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        /* Estilos para la paginación de CodeIgniter */
        .pagination-container ul {
            display: flex;
            gap: 8px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination-container li {
            display: inline-block;
        }

        .pagination-container a {
            display: block;
            padding: 10px 16px;
            background: rgba(255, 255, 255, 0.95);
            color: #667eea;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .pagination-container a:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .pagination-container .active a {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: #667eea;
        }

        /* Estilos para el autocompletado */
        .autocomplete-suggestions {
            background: white;
            border: 2px solid #667eea;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            margin-top: 5px;
            overflow: hidden;
        }

        .autocomplete-suggestion {
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f0f0f0;
        }

        .autocomplete-suggestion:last-child {
            border-bottom: none;
        }

        .autocomplete-suggestion:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .tasks-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .tasks-header h1 {
                font-size: 1.5rem;
            }

            .btn-new-task {
                width: 100%;
                justify-content: center;
            }

            .task-description {
                font-size: 0.95rem;
            }
        }
    </style>

    <script src="<?= site_url('/js/auto-complete.min.js') ?>"></script>
    
    <script>
        var searchUrl = "<?= site_url('/tasks/search?q=') ?>";
        var showUrl = "<?= site_url('/tasks/show/') ?>";
        var data;
        var i;
                
        var searchAutoComplete = new autoComplete({
            selector: 'input[name="query"]',
            cache: false,
            source: function(term, response) {

                var request = new XMLHttpRequest();

                request.open('GET', searchUrl + term, true);

                request.onload = function() {
                    
                    data = JSON.parse(this.response);

                    i = 0;

                    var suggestions = data.map(task => task.description);
                    
                    response(suggestions);
                };

                request.send();                
            },
            renderItem: function (item, search) {
                
                var id = data[i].id;
                
                i++;
                
                return '<div class="autocomplete-suggestion" data-id="' + id + '">' + item + '</div>';
            },
            onSelect: function(e, term, item){
                
                window.location.href = showUrl + item.getAttribute('data-id');
                
            }
        });
        
    </script>
    
<?= $this->endSection() ?>