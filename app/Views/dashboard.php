<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Empresa Autos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #fbfbfd;
            --text: #1d1d1f;
            --muted: #86868b;
            --line: #e8e8ed;
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

        /* Navbar */
        .site-nav { height: 56px; border-bottom: 1px solid var(--line); }
        .site-nav .navbar-brand { color: var(--text); font-size: 1.3rem; padding: 0; }
        .site-nav .nav-link {
            color: var(--muted);
            font-size: .85rem;
            padding: 0 1.1rem;
            transition: color .2s;
        }
        .site-nav .nav-link:hover,
        .site-nav .nav-link.active { color: var(--text); }
        .site-nav .dropdown-toggle::after { display: none; }

        .avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: var(--text);
            color: #fff;
            display: inline-grid; place-items: center;
            font-size: .8rem;
            font-weight: 600;
        }
        .dropdown-menu {
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
            padding: .4rem;
            font-size: .9rem;
        }
        .dropdown-item { border-radius: 9px; padding: .5rem .75rem; }
        .dropdown-item:active { background: var(--text); }

        /* Contenido */
        main { flex: 1; padding: 3.5rem 0 4rem; }

        .greeting { color: var(--muted); font-size: .95rem; margin-bottom: .25rem; }
        .page-title {
            font-size: clamp(2.2rem, 4.5vw, 3.2rem);
            font-weight: 600;
            letter-spacing: -.035em;
            line-height: 1.05;
        }

        /* Botones */
        .btn-main {
            background: var(--text);
            color: #fff;
            border: 0;
            border-radius: 12px;
            padding: .7rem 1.4rem;
            font-weight: 500;
            transition: background .2s;
        }
        .btn-main:hover, .btn-main:focus { background: #000; color: #fff; }
        .btn-ghost {
            background: #fff;
            color: var(--text);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: .7rem 1.4rem;
            font-weight: 500;
            transition: border-color .2s;
        }
        .btn-ghost:hover { border-color: var(--text); color: var(--text); }

        /* Tarjetas */
        .card-box {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 1.6rem;
            height: 100%;
        }
        .stat-label { color: var(--muted); font-size: .85rem; display: flex; align-items: center; gap: .5rem; }
        .stat-value {
            font-size: 2.4rem;
            font-weight: 600;
            letter-spacing: -.03em;
            line-height: 1.1;
            margin-top: .6rem;
        }
        .stat-trend { font-size: .8rem; color: var(--muted); margin-top: .35rem; }

        .section-title {
            font-size: 1.15rem;
            font-weight: 600;
            letter-spacing: -.01em;
            margin: 0;
        }
        .link-soft {
            color: var(--muted);
            text-decoration: none;
            font-size: .85rem;
            transition: color .2s;
        }
        .link-soft:hover { color: var(--text); }

        /* Tabla */
        .table { --bs-table-bg: transparent; margin: 0; }
        .table th {
            font-weight: 500;
            font-size: .75rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .05em;
            border-bottom: 1px solid var(--line);
            padding: .75rem .5rem;
        }
        .table td {
            padding: 1rem .5rem;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
            font-size: .92rem;
        }
        .table tr:last-child td { border-bottom: 0; }

        .status {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .82rem;
            color: var(--text);
        }
        .status::before {
            content: "";
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--muted);
        }
        .status.ok::before   { background: #1d1d1f; }
        .status.wait::before { background: #b0b0b5; }
        .status.off::before  { background: #d2d2d7; }

        /* Acciones rápidas */
        .action-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .95rem 0;
            border-bottom: 1px solid var(--line);
            color: var(--text);
            text-decoration: none;
            font-size: .95rem;
            font-weight: 500;
            transition: padding .2s;
        }
        .action-item:last-child { border-bottom: 0; padding-bottom: 0; }
        .action-item span { display: flex; align-items: center; gap: .8rem; }
        .action-item i.arrow { color: var(--muted); font-size: .8rem; transition: transform .2s; }
        .action-item:hover i.arrow { transform: translateX(3px); color: var(--text); }

        footer {
            text-align: center;
            font-size: .75rem;
            color: var(--muted);
            padding: 1.5rem 0;
            border-top: 1px solid var(--line);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg site-nav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('dashboard') ?>"><i class="bi bi-car-front-fill"></i></a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Vehículos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reportes</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php $nombre = session()->get('nombre') ?? 'Usuario'; ?>
                            <span class="avatar"><?= esc(strtoupper(substr($nombre, 0, 1))) ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="px-3 py-2 small text-secondary"><?= esc($nombre) ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Configuración</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">

            <!-- Encabezado -->
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-5">
                <div>
                    <p class="greeting">Hola, <?= esc($nombre) ?></p>
                    <h1 class="page-title mb-0">Dashboard</h1>
                </div>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-ghost"><i class="bi bi-download me-2"></i>Exportar</a>
                    <a href="#" class="btn btn-main"><i class="bi bi-plus-lg me-2"></i>Nuevo vehículo</a>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="row g-3 mb-3">
                <div class="col-sm-6 col-xl-3">
                    <div class="card-box">
                        <div class="stat-label"><i class="bi bi-car-front"></i> Vehículos en stock</div>
                        <div class="stat-value">128</div>
                        <div class="stat-trend">+4 este mes</div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card-box">
                        <div class="stat-label"><i class="bi bi-people"></i> Clientes</div>
                        <div class="stat-value">1,254</div>
                        <div class="stat-trend">+18 este mes</div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card-box">
                        <div class="stat-label"><i class="bi bi-receipt"></i> Ventas del mes</div>
                        <div class="stat-value">36</div>
                        <div class="stat-trend">+12% vs. mes anterior</div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card-box">
                        <div class="stat-label"><i class="bi bi-cash-stack"></i> Ingresos del mes</div>
                        <div class="stat-value">$84,300</div>
                        <div class="stat-trend">+8% vs. mes anterior</div>
                    </div>
                </div>
            </div>

            <!-- Tabla + acciones -->
            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="card-box">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="section-title">Últimas ventas</h2>
                            <a href="#" class="link-soft">Ver todas <i class="bi bi-chevron-right small"></i></a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Vehículo</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Carlos Ramírez</td>
                                        <td class="text-secondary">Toyota Corolla 2024</td>
                                        <td>$22,500</td>
                                        <td><span class="status ok">Completada</span></td>
                                    </tr>
                                    <tr>
                                        <td>María Torres</td>
                                        <td class="text-secondary">Kia Sportage 2023</td>
                                        <td>$27,800</td>
                                        <td><span class="status wait">Pendiente</span></td>
                                    </tr>
                                    <tr>
                                        <td>Luis Fernández</td>
                                        <td class="text-secondary">Hyundai Tucson 2025</td>
                                        <td>$31,200</td>
                                        <td><span class="status ok">Completada</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ana Gutiérrez</td>
                                        <td class="text-secondary">Nissan Versa 2022</td>
                                        <td>$14,900</td>
                                        <td><span class="status off">Cancelada</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-box">
                        <h2 class="section-title mb-2">Acciones rápidas</h2>
                        <a href="#" class="action-item">
                            <span><i class="bi bi-car-front"></i> Registrar vehículo</span>
                            <i class="bi bi-arrow-right arrow"></i>
                        </a>
                        <a href="#" class="action-item">
                            <span><i class="bi bi-person-plus"></i> Agregar cliente</span>
                            <i class="bi bi-arrow-right arrow"></i>
                        </a>
                        <a href="#" class="action-item">
                            <span><i class="bi bi-receipt"></i> Nueva venta</span>
                            <i class="bi bi-arrow-right arrow"></i>
                        </a>
                        <a href="#" class="action-item">
                            <span><i class="bi bi-bar-chart-line"></i> Ver reportes</span>
                            <i class="bi bi-arrow-right arrow"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer>&copy; <?= date('Y') ?> Empresa Autos</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>