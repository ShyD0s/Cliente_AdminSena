<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AdminSena - Gestión Académica')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --sena-green: #39a900;
            --sena-green-dark: #019a3b;
            --sena-orange: #ff6b0b;
            --sena-dark: #1e293b;
            --sena-light: #f8fafc;
            --sena-glass-bg: rgba(255, 255, 255, 0.9);
            --sena-glass-border: rgba(255, 255, 255, 0.4);
            --sena-gradient: linear-gradient(135deg, #39a900 0%, #019a3b 100%);
        }
        
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
            color: var(--sena-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar-custom {
            background: var(--sena-glass-bg);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--sena-glass-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand img {
            height: 40px;
            transition: transform 0.3s ease;
        }
        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .nav-link-custom {
            color: #475569;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .nav-link-custom:hover {
            color: var(--sena-green);
            background-color: rgba(57, 169, 0, 0.08);
        }

        .nav-link-custom.active {
            color: white !important;
            background: var(--sena-gradient);
            box-shadow: 0 4px 12px rgba(57, 169, 0, 0.2);
        }
        
        .card-glass {
            background: var(--sena-glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--sena-glass-border);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        
        .card-glass:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        }
        
        .table-custom th {
            background-color: #f1f5f9;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .btn-gradient {
            background: var(--sena-gradient);
            color: white;
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(57, 169, 0, 0.2);
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-gradient:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(57, 169, 0, 0.35);
        }
        
        .btn-gradient:active {
            transform: translateY(1px);
        }
        
        .footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 2rem 0;
            margin-top: auto;
            border-top: 4px solid var(--sena-green);
        }

        /* animations */
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <!-- el yield se usa para que las vistas puedan agregar estilos personalizados 
        y se pueden anadir estilos especificos para cada vista  -->
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-success fs-4" href="{{ url('/') }}">
                <img src="https://sciudadanos.sena.edu.co/Resources/logoSena.png" alt="SENA Logo">
                <span style="letter-spacing: -0.5px;">Admin<span class="text-dark">SENA</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="bi bi-grid-fill"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('teachers*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
                            <i class="bi bi-people-fill"></i> Docentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('apprentices*') ? 'active' : '' }}" href="{{ route('apprentices.index') }}">
                            <i class="bi bi-mortarboard-fill"></i> Aprendices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('areas*') ? 'active' : '' }}" href="{{ route('areas.index') }}">
                            <i class="bi bi-diagram-3-fill"></i> Áreas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('training_centers*') ? 'active' : '' }}" href="{{ route('training_centers.index') }}">
                            <i class="bi bi-building-fill"></i> Centros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('computers*') ? 'active' : '' }}" href="{{ route('computers.index') }}">
                            <i class="bi bi-pc-display-horizontal"></i> Equipos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ Request::is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                            <i class="bi bi-journal-bookmark-fill"></i> Cursos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="py-5 animate-fade-in">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid var(--sena-green) !important; border-radius: 12px;">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #ef4444 !important; border-radius: 12px;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <img src="https://sciudadanos.sena.edu.co/Resources/logoSena.png" alt="SENA Logo" style="height: 30px; margin-bottom: 1rem;">
            <p class="mb-1 fw-bold text-white">Servicio Nacional de Aprendizaje - SENA</p>
            <p class="mb-0 small text-white">© {{ date('Y') }} Plataforma de Gestión Académica AdminSena. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap src -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>