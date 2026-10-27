<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repuestos - Empresa Autos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #fbfbfd;
            --soft: #f5f5f7;
            --text: #1d1d1f;
            --muted: #86868b;
            --line: #e8e8ed;
            --bs-body-font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
        }

        /* ---------- Navbar ---------- */
        .site-nav {
            height: 56px;
            background: rgba(251, 251, 253, .85);
            backdrop-filter: saturate(180%) blur(20px);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            border-bottom: 1px solid var(--line);
        }
        .site-nav .navbar-brand { color: var(--text); font-size: 1.3rem; padding: 0; }
        .site-nav .nav-link {
            color: var(--muted);
            font-size: .85rem;
            padding: 0 1.1rem;
            transition: color .2s;
        }
        .site-nav .nav-link:hover, .site-nav .nav-link.active { color: var(--text); }
        .nav-icon { font-size: 1.05rem; padding: 0 .7rem !important; position: relative; }
        .cart-badge {
            position: absolute;
            top: -6px; right: 0;
            min-width: 17px; height: 17px;
            border-radius: 99px;
            background: var(--text);
            color: #fff;
            font-size: .65rem;
            font-weight: 600;
            display: none;
            place-items: center;
            padding: 0 4px;
        }
        .avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: var(--text);
            color: #fff;
            display: inline-grid; place-items: center;
            font-size: .78rem;
            font-weight: 600;
        }
        .dropdown-menu {
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,.06);
            padding: .4rem;
            font-size: .9rem;
        }
        .dropdown-item { border-radius: 9px; padding: .5rem .75rem; }
        .dropdown-item:active { background: var(--text); }

        /* ---------- Hero / buscador ---------- */
        .hero { padding: 4rem 0 2rem; }
        .hero h1 {
            font-size: clamp(2.4rem, 5vw, 3.8rem);
            font-weight: 600;
            letter-spacing: -.04em;
            line-height: 1.05;
        }
        .hero p { color: var(--muted); font-size: 1.15rem; }

        .search-bar {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: .4rem .4rem .4rem 1.1rem;
            max-width: 720px;
            transition: border-color .2s;
        }
        .search-bar:focus-within { border-color: var(--text); }
        .search-bar i { color: var(--muted); font-size: 1.1rem; }
        .search-bar input {
            border: 0; outline: 0; background: none;
            flex: 1; font-size: 1.05rem; padding: .6rem 0;
        }
        .search-bar select {
            border: 0; outline: 0;
            background: var(--soft);
            border-radius: 11px;
            padding: .65rem .9rem;
            font-size: .88rem;
            color: var(--text);
            max-width: 180px;
        }

        /* ---------- Categorías ---------- */
        .cats {
            display: flex;
            gap: 1.4rem;
            overflow-x: auto;
            padding: .5rem 0 1rem;
            scrollbar-width: none;
        }
        .cats::-webkit-scrollbar { display: none; }
        .cat {
            flex: 0 0 auto;
            width: 92px;
            text-align: center;
            background: none;
            border: 0;
            color: var(--text);
            cursor: pointer;
        }
        .cat .ico {
            width: 72px; height: 72px;
            margin: 0 auto .6rem;
            border-radius: 22px;
            background: var(--soft);
            display: grid; place-items: center;
            font-size: 1.7rem;
            border: 1px solid transparent;
            transition: all .2s;
        }
        .cat:hover .ico { background: #ececf0; }
        .cat.active .ico { background: var(--text); color: #fff; }
        .cat span.lbl { font-size: .8rem; font-weight: 500; display: block; }

        /* ---------- Títulos de sección ---------- */
        .section-title {
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: -.03em;
        }
        .link-soft { color: var(--muted); text-decoration: none; font-size: .9rem; }
        .link-soft:hover { color: var(--text); }

        /* ---------- Talleres ---------- */
        .workshop {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 1.1rem 1.2rem;
            height: 100%;
            cursor: pointer;
            transition: border-color .2s;
            width: 100%;
            text-align: left;
        }
        .workshop:hover { border-color: #b5b5ba; }
        .workshop.active { border-color: var(--text); }
        .workshop .logo {
            width: 48px; height: 48px;
            border-radius: 13px;
            background: var(--text);
            color: #fff;
            display: grid; place-items: center;
            font-size: 1.2rem;
            flex: 0 0 auto;
        }
        .workshop .name { font-weight: 600; font-size: .95rem; }
        .workshop .meta { color: var(--muted); font-size: .8rem; }

        /* ---------- Productos ---------- */
        .toolbar { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: .75rem; }
        .toolbar select {
            border: 1px solid var(--line);
            background: #fff;
            border-radius: 10px;
            padding: .5rem .8rem;
            font-size: .85rem;
        }

        .product {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 22px;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: transform .2s, border-color .2s;
        }
        .product:hover { transform: translateY(-3px); border-color: #c9c9ce; }
        .product .img {
            background: var(--soft);
            height: 170px;
            display: grid; place-items: center;
            font-size: 3.6rem;
            color: #a1a1a6;
            position: relative;
        }
        .product .img img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity .3s;
        }
        .product .img img.loaded { opacity: 1; }
        .product .tag {
            z-index: 2;
            position: absolute;
            top: 12px; left: 12px;
            background: #fff;
            border-radius: 99px;
            font-size: .7rem;
            font-weight: 500;
            padding: .2rem .65rem;
            color: var(--text);
        }
        .product .body { padding: 1.1rem 1.2rem 1.3rem; display: flex; flex-direction: column; flex: 1; }
        .product .cat-name { color: var(--muted); font-size: .75rem; text-transform: uppercase; letter-spacing: .05em; }
        .product .title { font-weight: 600; font-size: 1rem; margin: .2rem 0 .3rem; letter-spacing: -.01em; }
        .product .shop { color: var(--muted); font-size: .82rem; }
        .product .price { font-size: 1.3rem; font-weight: 600; letter-spacing: -.02em; }

        .btn-main {
            background: var(--text);
            color: #fff;
            border: 0;
            border-radius: 11px;
            padding: .55rem 1rem;
            font-size: .85rem;
            font-weight: 500;
            transition: background .2s, transform .1s;
        }
        .btn-main:hover { background: #000; color: #fff; }
        .btn-main:active { transform: scale(.97); }

        .empty { display: none; text-align: center; padding: 4rem 0; color: var(--muted); }
        .empty i { font-size: 2.5rem; display: block; margin-bottom: .75rem; }

        footer {
            text-align: center;
            font-size: .75rem;
            color: var(--muted);
            padding: 1.5rem 0;
            border-top: 1px solid var(--line);
            margin-top: 5rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg site-nav sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('menu') ?>"><i class="bi bi-car-front-fill"></i></a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#talleres">Talleres</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mis pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ayuda</a></li>
                </ul>
                <ul class="navbar-nav flex-row align-items-center">
                    <li class="nav-item">
                        <a class="nav-link nav-icon" href="#" aria-label="Carrito">
                            <i class="bi bi-bag"></i><span class="cart-badge" id="cartCount">0</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php $nombre = session()->get('nombre') ?? 'Usuario'; ?>
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">
                            <span class="avatar"><?= esc(strtoupper(substr($nombre, 0, 1))) ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="px-3 py-2 small text-secondary"><?= esc($nombre) ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Mi cuenta</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-heart me-2"></i>Favoritos</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero + buscador -->
    <section class="hero">
        <div class="container">
            <h1 class="mb-2">¿Qué repuesto<br>estás buscando?</h1>
            <p class="mb-4">Compara motores y repuestos de los mejores talleres.</p>

            <div class="search-bar">
                <i class="bi bi-search"></i>
                <input type="text" id="q" placeholder="Busca motores, frenos, filtros..." autocomplete="off">
                <select id="shopSelect" aria-label="Taller">
                    <option value="all">Todos los talleres</option>
                    <option value="AutoMotores Lima">AutoMotores Lima</option>
                    <option value="Taller Central">Taller Central</option>
                    <option value="Repuestos Pacheco">Repuestos Pacheco</option>
                    <option value="Mecánica Pro">Mecánica Pro</option>
                </select>
            </div>
        </div>
    </section>

    <main class="container">

        <!-- Categorías -->
        <div class="cats" id="cats">
            <button class="cat active" data-cat="all"><div class="ico"><i class="bi bi-grid"></i></div><span class="lbl">Todo</span></button>
            <button class="cat" data-cat="Motores"><div class="ico"><i class="bi bi-gear-wide-connected"></i></div><span class="lbl">Motores</span></button>
            <button class="cat" data-cat="Frenos"><div class="ico"><i class="bi bi-disc"></i></div><span class="lbl">Frenos</span></button>
            <button class="cat" data-cat="Suspensión"><div class="ico"><i class="bi bi-arrows-vertical"></i></div><span class="lbl">Suspensión</span></button>
            <button class="cat" data-cat="Transmisión"><div class="ico"><i class="bi bi-sliders"></i></div><span class="lbl">Transmisión</span></button>
            <button class="cat" data-cat="Eléctrico"><div class="ico"><i class="bi bi-lightning-charge"></i></div><span class="lbl">Eléctrico</span></button>
            <button class="cat" data-cat="Filtros"><div class="ico"><i class="bi bi-funnel"></i></div><span class="lbl">Filtros</span></button>
            <button class="cat" data-cat="Llantas"><div class="ico"><i class="bi bi-record-circle"></i></div><span class="lbl">Llantas</span></button>
            <button class="cat" data-cat="Aceites"><div class="ico"><i class="bi bi-droplet"></i></div><span class="lbl">Aceites</span></button>
            <button class="cat" data-cat="Iluminación"><div class="ico"><i class="bi bi-lightbulb"></i></div><span class="lbl">Iluminación</span></button>
            <button class="cat" data-cat="Carrocería"><div class="ico"><i class="bi bi-car-front"></i></div><span class="lbl">Carrocería</span></button>
        </div>

        <!-- Talleres -->
        <section class="mt-5" id="talleres">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h2 class="section-title mb-0">Talleres</h2>
                <a href="#" class="link-soft" id="clearShop">Ver todos <i class="bi bi-chevron-right small"></i></a>
            </div>
            <div class="row g-3">
                <div class="col-sm-6 col-lg-3">
                    <button class="workshop" data-shop="AutoMotores Lima">
                        <div class="logo"><i class="bi bi-gear-wide-connected"></i></div>
                        <div><div class="name">AutoMotores Lima</div><div class="meta"><i class="bi bi-star-fill"></i> 4.9 · Miraflores</div></div>
                    </button>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <button class="workshop" data-shop="Taller Central">
                        <div class="logo"><i class="bi bi-wrench-adjustable"></i></div>
                        <div><div class="name">Taller Central</div><div class="meta"><i class="bi bi-star-fill"></i> 4.7 · Cercado</div></div>
                    </button>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <button class="workshop" data-shop="Repuestos Pacheco">
                        <div class="logo"><i class="bi bi-box-seam"></i></div>
                        <div><div class="name">Repuestos Pacheco</div><div class="meta"><i class="bi bi-star-fill"></i> 4.8 · La Victoria</div></div>
                    </button>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <button class="workshop" data-shop="Mecánica Pro">
                        <div class="logo"><i class="bi bi-tools"></i></div>
                        <div><div class="name">Mecánica Pro</div><div class="meta"><i class="bi bi-star-fill"></i> 4.6 · San Borja</div></div>
                    </button>
                </div>
            </div>
        </section>

        <!-- Productos -->
        <section class="mt-5">
            <div class="toolbar mb-3">
                <h2 class="section-title mb-0" id="resultTitle">Todos los productos</h2>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-secondary small" id="resultCount"></span>
                    <select id="sort" aria-label="Ordenar">
                        <option value="rel">Ordenar: relevancia</option>
                        <option value="asc">Precio: menor a mayor</option>
                        <option value="desc">Precio: mayor a menor</option>
                    </select>
                </div>
            </div>

            <!-- Cuando tengas la BD: reemplaza estos ejemplos con un foreach($productos as $p) -->
            <div class="row g-3" id="grid">
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Motores" data-shop="AutoMotores Lima" data-price="4800" data-name="Motor Toyota 1.8L 2ZR">
                    <div class="product"><div class="img"><i class="bi bi-gear-wide-connected"></i><span class="tag">Reacondicionado</span></div>
                    <div class="body"><span class="cat-name">Motores</span><div class="title">Motor Toyota 1.8L 2ZR</div><div class="shop"><i class="bi bi-shop"></i> AutoMotores Lima</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 4,800</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Motores" data-shop="Taller Central" data-price="5200" data-name="Motor Hyundai 2.0L">
                    <div class="product"><div class="img"><i class="bi bi-gear-wide-connected"></i><span class="tag">Usado</span></div>
                    <div class="body"><span class="cat-name">Motores</span><div class="title">Motor Hyundai 2.0L</div><div class="shop"><i class="bi bi-shop"></i> Taller Central</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 5,200</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Motores" data-shop="Mecánica Pro" data-price="6900" data-name="Motor Kia 2.4L Sportage">
                    <div class="product"><div class="img"><i class="bi bi-gear-wide-connected"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Motores</span><div class="title">Motor Kia 2.4L Sportage</div><div class="shop"><i class="bi bi-shop"></i> Mecánica Pro</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 6,900</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Frenos" data-shop="Repuestos Pacheco" data-price="185" data-name="Pastillas de freno delanteras">
                    <div class="product"><div class="img"><i class="bi bi-disc"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Frenos</span><div class="title">Pastillas de freno delanteras</div><div class="shop"><i class="bi bi-shop"></i> Repuestos Pacheco</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 185</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Frenos" data-shop="AutoMotores Lima" data-price="320" data-name="Discos de freno ventilados (par)">
                    <div class="product"><div class="img"><i class="bi bi-disc"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Frenos</span><div class="title">Discos de freno ventilados (par)</div><div class="shop"><i class="bi bi-shop"></i> AutoMotores Lima</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 320</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Suspensión" data-shop="Taller Central" data-price="450" data-name="Amortiguadores traseros (par)">
                    <div class="product"><div class="img"><i class="bi bi-arrows-vertical"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Suspensión</span><div class="title">Amortiguadores traseros (par)</div><div class="shop"><i class="bi bi-shop"></i> Taller Central</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 450</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Transmisión" data-shop="Mecánica Pro" data-price="2100" data-name="Caja automática Nissan CVT">
                    <div class="product"><div class="img"><i class="bi bi-sliders"></i><span class="tag">Usado</span></div>
                    <div class="body"><span class="cat-name">Transmisión</span><div class="title">Caja automática Nissan CVT</div><div class="shop"><i class="bi bi-shop"></i> Mecánica Pro</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 2,100</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Eléctrico" data-shop="Repuestos Pacheco" data-price="380" data-name="Batería 12V 65Ah">
                    <div class="product"><div class="img"><i class="bi bi-lightning-charge"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Eléctrico</span><div class="title">Batería 12V 65Ah</div><div class="shop"><i class="bi bi-shop"></i> Repuestos Pacheco</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 380</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Eléctrico" data-shop="AutoMotores Lima" data-price="260" data-name="Alternador 90A">
                    <div class="product"><div class="img"><i class="bi bi-lightning-charge"></i><span class="tag">Reacondicionado</span></div>
                    <div class="body"><span class="cat-name">Eléctrico</span><div class="title">Alternador 90A</div><div class="shop"><i class="bi bi-shop"></i> AutoMotores Lima</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 260</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Filtros" data-shop="Taller Central" data-price="35" data-name="Filtro de aceite">
                    <div class="product"><div class="img"><i class="bi bi-funnel"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Filtros</span><div class="title">Filtro de aceite</div><div class="shop"><i class="bi bi-shop"></i> Taller Central</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 35</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Aceites" data-shop="Mecánica Pro" data-price="210" data-name="Aceite sintético 5W-30 (4L)">
                    <div class="product"><div class="img"><i class="bi bi-droplet"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Aceites</span><div class="title">Aceite sintético 5W-30 (4L)</div><div class="shop"><i class="bi bi-shop"></i> Mecánica Pro</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 210</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Llantas" data-shop="Repuestos Pacheco" data-price="890" data-name="Llantas 205/55 R16 (juego de 4)">
                    <div class="product"><div class="img"><i class="bi bi-record-circle"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Llantas</span><div class="title">Llantas 205/55 R16 (juego de 4)</div><div class="shop"><i class="bi bi-shop"></i> Repuestos Pacheco</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 890</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Iluminación" data-shop="AutoMotores Lima" data-price="140" data-name="Faros LED delanteros (par)">
                    <div class="product"><div class="img"><i class="bi bi-lightbulb"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Iluminación</span><div class="title">Faros LED delanteros (par)</div><div class="shop"><i class="bi bi-shop"></i> AutoMotores Lima</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 140</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Carrocería" data-shop="Taller Central" data-price="520" data-name="Parachoques delantero Corolla">
                    <div class="product"><div class="img"><i class="bi bi-car-front"></i><span class="tag">Usado</span></div>
                    <div class="body"><span class="cat-name">Carrocería</span><div class="title">Parachoques delantero Corolla</div><div class="shop"><i class="bi bi-shop"></i> Taller Central</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 520</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Suspensión" data-shop="Mecánica Pro" data-price="95" data-name="Rótulas de dirección (par)">
                    <div class="product"><div class="img"><i class="bi bi-arrows-vertical"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Suspensión</span><div class="title">Rótulas de dirección (par)</div><div class="shop"><i class="bi bi-shop"></i> Mecánica Pro</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 95</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 item" data-cat="Filtros" data-shop="Repuestos Pacheco" data-price="48" data-name="Filtro de aire">
                    <div class="product"><div class="img"><i class="bi bi-funnel"></i><span class="tag">Nuevo</span></div>
                    <div class="body"><span class="cat-name">Filtros</span><div class="title">Filtro de aire</div><div class="shop"><i class="bi bi-shop"></i> Repuestos Pacheco</div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3"><span class="price">S/ 48</span><button class="btn btn-main add">Agregar</button></div></div></div>
                </div>
            </div>

            <div class="empty" id="empty">
                <i class="bi bi-search"></i>
                No encontramos productos con esos filtros.
            </div>
        </section>
    </main>

    <footer>&copy; <?= date('Y') ?> Empresa Autos</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const state = { cat: 'all', shop: 'all', q: '', sort: 'rel' };
        const grid = document.getElementById('grid');
        const items = Array.from(grid.querySelectorAll('.item'));
        const original = items.slice();

        const $q = document.getElementById('q');
        const $shopSelect = document.getElementById('shopSelect');
        const $sort = document.getElementById('sort');

        function render() {
            let list = original.filter(el => {
                const okCat  = state.cat === 'all'  || el.dataset.cat === state.cat;
                const okShop = state.shop === 'all' || el.dataset.shop === state.shop;
                const text   = (el.dataset.name + ' ' + el.dataset.cat + ' ' + el.dataset.shop).toLowerCase();
                const okQ    = !state.q || text.includes(state.q.toLowerCase());
                return okCat && okShop && okQ;
            });

            if (state.sort === 'asc')  list.sort((a, b) => a.dataset.price - b.dataset.price);
            if (state.sort === 'desc') list.sort((a, b) => b.dataset.price - a.dataset.price);

            original.forEach(el => el.style.display = 'none');
            list.forEach(el => { el.style.display = ''; grid.appendChild(el); });

            document.getElementById('empty').style.display = list.length ? 'none' : 'block';
            document.getElementById('resultCount').textContent = list.length + (list.length === 1 ? ' producto' : ' productos');

            let title = state.cat === 'all' ? 'Todos los productos' : state.cat;
            if (state.shop !== 'all') title += ' · ' + state.shop;
            document.getElementById('resultTitle').textContent = title;

            document.querySelectorAll('.cat').forEach(b => b.classList.toggle('active', b.dataset.cat === state.cat));
            document.querySelectorAll('.workshop').forEach(b => b.classList.toggle('active', b.dataset.shop === state.shop));
            $shopSelect.value = state.shop;
        }

        document.getElementById('cats').addEventListener('click', e => {
            const b = e.target.closest('.cat'); if (!b) return;
            state.cat = b.dataset.cat; render();
        });

        document.querySelectorAll('.workshop').forEach(b => b.addEventListener('click', () => {
            state.shop = state.shop === b.dataset.shop ? 'all' : b.dataset.shop; render();
        }));

        document.getElementById('clearShop').addEventListener('click', e => {
            e.preventDefault(); state.shop = 'all'; render();
        });

        $q.addEventListener('input', () => { state.q = $q.value.trim(); render(); });
        $shopSelect.addEventListener('change', () => { state.shop = $shopSelect.value; render(); });
        $sort.addEventListener('change', () => { state.sort = $sort.value; render(); });

        // Carrito (solo contador visual por ahora)
        let count = 0;
        const badge = document.getElementById('cartCount');
        grid.addEventListener('click', e => {
            const btn = e.target.closest('.add'); if (!btn) return;
            count++; badge.textContent = count; badge.style.display = 'grid';
            btn.textContent = 'Agregado ✓';
            setTimeout(() => btn.textContent = 'Agregar', 1200);
        });

        // Imágenes de productos: guarda los archivos en public/img/productos/
        // Si un archivo no existe, se queda el icono (no se rompe nada).
        const IMG_BASE = "<?= base_url('img/productos') ?>/";
        const IMAGES = {
            "Motor Toyota 1.8L 2ZR":              "motor-toyota.jpg",
            "Motor Hyundai 2.0L":                 "motor-hyundai.jpg",
            "Motor Kia 2.4L Sportage":            "motor-kia.jpg",
            "Pastillas de freno delanteras":      "pastillas-freno.jpg",
            "Discos de freno ventilados (par)":   "discos-freno.jpg",
            "Amortiguadores traseros (par)":      "amortiguadores.jpg",
            "Caja automática Nissan CVT":         "caja-cvt.jpg",
            "Batería 12V 65Ah":                   "bateria.jpg",
            "Alternador 90A":                     "alternador.jpg",
            "Filtro de aceite":                   "filtro-aceite.jpg",
            "Aceite sintético 5W-30 (4L)":        "aceite-5w30.jpg",
            "Llantas 205/55 R16 (juego de 4)":    "llantas.jpg",
            "Faros LED delanteros (par)":         "faros-led.jpg",
            "Parachoques delantero Corolla":      "parachoques.jpg",
            "Rótulas de dirección (par)":         "rotulas.jpg",
            "Filtro de aire":                     "filtro-aire.jpg"
        };

        // Fotos directas de la web (por palabra clave). Se usan mientras no
        // exista el archivo local de IMAGES. Si ninguna carga, queda el icono.
        const KEYWORDS = {
            "Motor Toyota 1.8L 2ZR":              "car,engine",
            "Motor Hyundai 2.0L":                 "engine,motor",
            "Motor Kia 2.4L Sportage":            "engine,cylinder",
            "Pastillas de freno delanteras":      "brake,pads",
            "Discos de freno ventilados (par)":   "brake,disc",
            "Amortiguadores traseros (par)":      "shock,absorber",
            "Caja automática Nissan CVT":         "gearbox,transmission",
            "Batería 12V 65Ah":                   "car,battery",
            "Alternador 90A":                     "alternator,engine",
            "Filtro de aceite":                   "oil,filter",
            "Aceite sintético 5W-30 (4L)":        "motor,oil",
            "Llantas 205/55 R16 (juego de 4)":    "car,tires",
            "Faros LED delanteros (par)":         "car,headlight",
            "Parachoques delantero Corolla":      "car,bumper",
            "Rótulas de dirección (par)":         "suspension,car",
            "Filtro de aire":                     "air,filter"
        };

        original.forEach((el, i) => {
            const name = el.dataset.name;
            const box = el.querySelector('.img');
            if (!box) return;

            const remote = () => "https://loremflickr.com/600/450/" + (KEYWORDS[name] || "car,parts") + "/all?lock=" + (i + 1);

            const img = new Image();
            img.alt = name;
            img.loading = 'lazy';
            img.onload = () => img.classList.add('loaded');

            let usedRemote = !IMAGES[name];
            img.onerror = () => {
                if (!usedRemote) { usedRemote = true; img.src = remote(); }
                else img.remove();
            };
            img.src = IMAGES[name] ? IMG_BASE + IMAGES[name] : remote();
            box.prepend(img);
        });

        render();
    </script>
</body>
</html>