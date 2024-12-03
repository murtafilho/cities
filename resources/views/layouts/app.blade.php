<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App iOS Simulado')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Simulando uma barra superior como no iOS */
        .ios-header {
            height: 60px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .ios-header h1 {
            font-size: 20px;
            font-weight: 500;
            margin: 0;
        }

        /* Espaço para evitar sobreposição da barra superior */
        .content {
            padding-top: 70px;
        }

        /* Barra inferior de navegação */
        .ios-footer {
            height: 60px;
            background-color: #f8f9fa;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .ios-footer a {
            text-align: center;
            color: #495057;
            font-size: 14px;
            text-decoration: none;
        }

        .ios-footer a:hover {
            color: #007bff;
        }

        /* Adicionando ícones */
        .ios-footer i {
            font-size: 18px;
            display: block;
        }

        /* Estilo geral para a página */
        body {
            background-color: #fefefe;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .nav-link.active {
            font-weight: bold;
            color: #007bff !important;
        }
    </style>
</head>
<body>
    <!-- Barra superior -->
    <div class="ios-header">
        <h1>@yield('title', 'App iOS')</h1>
    </div>

    <!-- Conteúdo principal -->
    <div class="content container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Barra inferior de navegação -->
    <div class="ios-footer">
        <a href="{{ route('problemas.index') }}" class="nav-link {{ request()->routeIs('problemas.index') ? 'active' : '' }}">
            <i class="bi bi-house"></i>
            Home
        </a>
        <a href="{{ route('problemas.create') }}" class="nav-link {{ request()->routeIs('problemas.create') ? 'active' : '' }}">
            <i class="bi bi-plus-circle"></i>
            Novo
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-info-circle"></i>
            Sobre
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ícones do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
