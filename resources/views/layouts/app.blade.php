<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
</head>
<body class="h-screen flex bg-gray-100 overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col justify-between">
        <div>
            <div class="p-6 text-xl font-bold text-orange-400 flex items-center gap-2">
                <i class="fas fa-user-circle text-2xl"></i>
                admin1
            </div>
            <nav class="mt-4 space-y-1 px-4">
                <a href="#" class="flex items-center p-2 rounded bg-gray-800 hover:bg-orange-400 hover:text-white">
                    <i class="fas fa-book mr-3"></i> Documents
                </a>
                <a href="#" class="flex items-center p-2 rounded hover:bg-orange-400 hover:text-white">
                    <i class="fas fa-plus mr-3"></i> Ajouter Document
                </a>
                <a href="#" class="flex items-center p-2 rounded hover:bg-orange-400 hover:text-white">
                    <i class="fas fa-edit mr-3"></i> Modifier Document
                </a>
                <a href="#" class="flex items-center p-2 rounded hover:bg-orange-400 hover:text-white mt-6">
                    <i class="fas fa-users mr-3"></i> Adhérents
                </a>
                <a href="#" class="flex items-center p-2 rounded hover:bg-orange-400 hover:text-white">
                    <i class="fas fa-user-plus mr-3"></i> Ajouter adhérent
                </a>
                <a href="#" class="flex items-center p-2 rounded hover:bg-orange-400 hover:text-white">
                    <i class="fas fa-user-edit mr-3"></i> Modifier adhérent
                </a>
            </nav>
        </div>

        <div class="p-4">
            <a href="{{ route('logout') }}" class="flex items-center p-2 rounded text-red-500 hover:bg-red-600 hover:text-white">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnecter
            </a>
        </div>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <div class="flex-1 flex flex-col h-full">

        <!-- TOPBAR -->
        <header class="bg-gray-900 text-white px-6 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fas fa-book-open text-orange-400 text-2xl"></i>
                <h1 class="text-xl font-semibold">Documents</h1>
            </div>
        </header>

        <!-- BARRE DE NAVIGATION SECONDAIRE -->
        <div class="bg-orange-500 text-white px-6 py-2 flex space-x-6">
            <a href="#" class="border-b-4 border-white pb-1">Livre</a>
            <a href="#" class="hover:underline">Magazine</a>
            <a href="#" class="hover:underline">Dictionnaire</a>
        </div>

        <!-- CONTENU -->
        <main class="flex-1 overflow-y-auto px-6 py-4 bg-white">
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer class="bg-gray-100 text-center py-2 text-gray-500 text-sm">
            © {{ date('Y') }} - Mini Biblio. Tous droits réservés.
        </footer>
    </div>

</body>
</html>
