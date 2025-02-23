<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion Projets') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <style>
        /* HEADER PRINCIPAL */
        .top-header {
            background-color: #0d6efd; /* Bleu Bootstrap */
            color: white;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .top-header img {
            height: 40px;
            margin-right: 10px;
        }

        .top-header h4 {
            margin: 0;
            font-size: 20px;
            flex-grow: 1;
        }

        .top-header .btn {
            color: white;
            border-color: white;
        }

        .top-header .btn:hover {
            background-color: white;
            color: #0d6efd;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background-color: #f8f9fa; /* Fond clair */
            min-height: 100vh;
            padding: 20px 10px;
            border-right: 1px solid #ddd;
        }

        /* SECTION "GESTION PROJETS" DANS LA SIDEBAR */
        .sidebar-header {
            background-color: #0d6efd; /* Même bleu que le header */
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .sidebar-header img {
            height: 30px;
            margin-right: 10px;
        }

        /* LIENS DE LA SIDEBAR */
        .sidebar .nav-link {
            color: #333;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
        }

        .sidebar .nav-link:hover {
            background: #0d6efd;
            color: white;
            transform: translateX(5px);
        }

        /* CONTENU PRINCIPAL (DASHBOARD) */
        .content {
            padding: 20px;
            background: #F5F5F5; /* Blanc cassé */
            flex-grow: 1;
            min-height: 100vh;
        }
    </style>

</head>
<body>
    <div id="app">
        <!-- Header Principal avec Logo & Navbar -->
        <header class="top-header">
            <img src="{{ asset('assets/images/image1.png') }}" alt="Logo">
            <h4>Gestion des Projets</h4>
            <div>
                @guest
                    <a class="btn btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                @else
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </header>

        <div class="d-flex">
            <!-- Sidebar -->
            <nav class="sidebar">
                <!-- Section Gestion Projets -->
                <div class="sidebar-header">
                    <img src="{{ asset('assets/images/image1.png') }}" alt="Logo">
                    Gestion Projets
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">📊 Tableau de Bord</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}" class="nav-link">📁 Projets</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tasks.index') }}" class="nav-link">✅ Tâches</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">👥 Utilisateurs & Rôles</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('notifications.index') }}" class="nav-link">📩 Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('files.index') }}" class="nav-link">📂 Fichiers</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
 <main class="content">
    <!-- Affichage des messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
 </main>

        </div>
    </div>
    
</body>
</html>
