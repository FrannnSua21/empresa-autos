<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión - Empresa Autos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #fbfbfd;
            --text: #1d1d1f;
            --muted: #86868b;
            --line: #d2d2d7;
            --bs-body-font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar mínimo */
        .site-nav { height: 56px; }
        .site-nav .navbar-brand { color: var(--text); font-size: 1.3rem; padding: 0; }
        .site-nav .nav-link {
            color: var(--muted);
            font-size: .85rem;
            padding: 0 0 0 1.5rem;
            transition: color .2s;
        }
        .site-nav .nav-link:hover { color: var(--text); }

        /* Centro */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem 5rem;
        }
        .login-box { width: 100%; max-width: 360px; text-align: center; }

        .logo {
            width: 64px; height: 64px;
            border-radius: 16px;
            background: var(--text);
            color: #fff;
            display: grid; place-items: center;
            font-size: 1.9rem;
            margin: 0 auto 1.75rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -.03em;
            margin-bottom: .4rem;
        }
        .subtitle { color: var(--muted); margin-bottom: 2rem; }

        /* Campos */
        .form-floating > .form-control {
            height: 3.4rem;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            box-shadow: none;
            transition: border-color .2s;
        }
        .form-floating > .form-control:focus {
            border-color: var(--text);
            box-shadow: none;
        }
        .form-floating > label { color: var(--muted); }

        .toggle-pass {
            position: absolute;
            top: 50%; right: 14px;
            transform: translateY(-50%);
            border: 0; background: none;
            color: var(--muted);
            z-index: 5;
        }
        .toggle-pass:hover { color: var(--text); }

        /* Botón negro */
        .btn-main {
            background: var(--text);
            color: #fff;
            border: 0;
            border-radius: 12px;
            height: 3.4rem;
            font-weight: 500;
            transition: background .2s, transform .1s;
        }
        .btn-main:hover, .btn-main:focus { background: #000; color: #fff; }
        .btn-main:active { transform: scale(.985); }

        .link-soft {
            color: var(--muted);
            text-decoration: none;
            font-size: .85rem;
            transition: color .2s;
        }
        .link-soft:hover { color: var(--text); }

        footer {
            text-align: center;
            font-size: .75rem;
            color: var(--muted);
            padding: 1.5rem 0;
        }
    </style>
</head>
<body>

    <nav class="navbar site-nav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>"><i class="bi bi-car-front-fill"></i></a>
            <div class="d-flex">
                <a class="nav-link" href="#">Ayuda</a>
                <a class="nav-link" href="#">Contacto</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="login-box">
            <div class="logo"><i class="bi bi-car-front-fill"></i></div>

            <h1>Iniciar sesión</h1>
            <p class="subtitle">Empresa Autos</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-light border text-start small rounded-3" role="alert">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/auth') ?>" method="post" novalidate>
                <?= csrf_field() ?>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Correo electrónico" value="<?= old('email') ?>"
                           autocomplete="email" autofocus required>
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="form-floating mb-4 position-relative">
                    <input type="password" class="form-control pe-5" id="password" name="password"
                           placeholder="Contraseña" autocomplete="current-password" required>
                    <label for="password">Contraseña</label>
                    <button type="button" class="toggle-pass" id="togglePass" aria-label="Mostrar contraseña">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-main w-100">Continuar</button>
            </form>

            <div class="mt-4">
                <a href="#" class="link-soft">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </main>

    <footer>&copy; <?= date('Y') ?> Empresa Autos</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const btn = document.getElementById('togglePass');
        const input = document.getElementById('password');
        btn.addEventListener('click', () => {
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.innerHTML = show ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
        });
    </script>
</body>
</html>