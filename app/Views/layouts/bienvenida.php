<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Navbar */
        nav {
            background: rgba(255, 255, 255, 0.98);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .user-greeting {
            color: #667eea;
            font-weight: 600;
            padding: 8px 16px;
        }

        .btn-nav {
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-nav.primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-nav.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-nav.secondary {
            border: 2px solid #667eea;
            color: #667eea;
        }

        .btn-nav.secondary:hover {
            background: #667eea;
            color: white;
        }

        .btn-nav.logout {
            background: #f5576c;
            color: white;
        }

        .btn-nav.logout:hover {
            background: #e04055;
            transform: translateY(-2px);
        }

        /* Messages */
        .messages-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .message {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .message:before {
            font-size: 1.2rem;
        }

        .warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            color: #856404;
        }

        .warning:before {
            content: "⚠️";
        }

        .info {
            background: #d1ecf1;
            border-left: 4px solid #17a2b8;
            color: #0c5460;
        }

        .info:before {
            content: "ℹ️";
        }

        .error {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            color: #721c24;
        }

        .error:before {
            content: "❌";
        }

        /* Content Container */
        .content-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .container {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
            margin: 0 auto;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        button {
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-home {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-signup {
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
        }

        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(245, 87, 108, 0.4);
        }

        .btn-login {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-login:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }
        
        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .form-footer {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .form-footer p {
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .form-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #764ba2;
        }

        .link-back {
            display: inline-block;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .error-container {
            background: #fee;
            border: 1px solid #fcc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .error-container ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .error-container li {
            color: #c33;
            font-size: 0.9rem;
            padding: 5px 0;
        }

        .error-container li:before {
            content: "⚠ ";
            margin-right: 5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                width: 100%;
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-container">
            <a href="<?= site_url("/") ?>" class="nav-brand">Mi App</a>
            
            <div class="nav-links">
                <?php if (current_user()): ?>
                    
                    <span class="user-greeting">👋 Hola, <?= esc(current_user()->name) ?></span>
                    
                    <a href="<?= site_url("/profile/show") ?>">Perfil</a>
                    
                    <?php if (current_user()->is_admin): ?>
                        <a href="<?= site_url("/admin/users") ?>">Usuarios</a>
                    <?php endif; ?>
                    
                    <a href="<?= site_url("/tasks") ?>">Tareas</a>
                    
                    <a href="<?= site_url("/logout") ?>" class="btn-nav logout">Cerrar Sesión</a>
                    
                <?php else: ?>
                    
                    <a href="<?= site_url("/signup") ?>" class="btn-nav secondary">Registrarse</a>    
                    
                    <a href="<?= site_url("/login") ?>" class="btn-nav primary">Iniciar Sesión</a>
                    
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Messages -->
    <?php if (session()->has('warning') || session()->has('info') || session()->has('error')): ?>
        <div class="messages-container">
            <?php if (session()->has('warning')): ?>
                <div class="message warning">
                    <?= session('warning') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('info')): ?>
                <div class="message info">
                    <?= session('info') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('error')): ?>
                <div class="message error">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="container">
            <?= $this->renderSection("content") ?>
        </div>
        <?= $this->renderSection("content2") ?>
    </div>
    
</body>
</html>