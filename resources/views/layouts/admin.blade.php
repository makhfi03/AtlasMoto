<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasMoto | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 flex min-h-screen">
    <aside class="w-64 bg-black text-white hidden md:flex flex-col sticky top-0 h-screen shadow-2xl">
        <div class="p-8 text-2xl font-black italic uppercase">Atlas<span class="text-orange-600">Moto</span></div>
        <nav class="flex-1 px-4 space-y-2 mt-4 text-sm font-bold uppercase italic text-gray-400">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 hover:text-white transition group italic">
                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.motos') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 hover:text-white transition group italic">
                <i class="fas fa-motorcycle"></i> <span>Motos</span>
            </a>
            <a href="{{ route('accessoires') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 hover:text-white transition group italic">
                <i class="fas fa-helmet-safety"></i> <span>Accessoires</span>
            </a>
            <a href="{{ route('admin.reservations') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-orange-600 hover:text-white transition">
                <i class="fas fa-calendar-alt"></i><span>Réservations</span>
            </a>
            <a href="{{ route('commandes') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 hover:text-white transition group italic">
                <i class="fas fa-shopping-bag"></i> <span>Commandes</span>
            </a>
            <a href="{{ route('users.admin') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-orange-600 hover:text-white transition group italic">
                <i class="fas fa-users"></i> <span>Utilisateurs</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-white h-16 shadow-sm flex items-center justify-end px-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-black italic uppercase text-red-500 hover:text-red-700">Déconnexion</button>
            </form>
        </header>
        <main class="p-8">@yield('content')</main>
    </div>
</body>

</html>