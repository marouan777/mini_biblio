<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <style>
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        input:-webkit-autofill,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #1f2937 inset !important;
            /* #1f2937 = bg-gray-800 */
            -webkit-text-fill-color: white !important;
            transition: background-color 9999s ease-in-out 0s;
        }
    </style>
</head>

<body class="h-screen flex">
    <!-- Left side with image -->
    <div class="w-1/2 relative bg-cover bg-center" style="background-image: url('/images/biblio_login.jpg')">
        <div class="absolute inset-0 bg-gradient-to-t from-orange-500 to-transparent opacity-80"></div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white text-center">
            <p class="text-xl mb-5 text-shadow ">Si vous n'avez pas un compte</p>
            <a href="{{ route('register') }}" class="border border-white px-16 sm:px-19 md:px-32 py-2 rounded-2xl shadow-lg hover:bg-white hover:text-orange-500 transition">Inscrire</a>
        </div>
    </div>

    <!-- Login form -->
    <div class="w-1/2 flex items-center justify-center bg-gray-900 text-white">
        <div class="w-full max-w-md px-6">
            <h2 class="text-3xl font-semibold text-orange-400 mb-8 text-center">
                🔒 Se connecter
            </h2>

            @if (session('status'))
            <div class="mb-4 text-green-500">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm text-orange-400 mb-1">Nom utilisateur</label>
                    <div class="flex items-center border-b border-orange-400 focus-within:border-orange-500">
                        <i class="fas fa-user text-orange-400 mr-3"></i>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="ex: user@example.com"
                            value="{{ old('email') }}"
                            required
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none">
                    </div>
                    @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="password" class="block text-sm text-orange-400 mb-1">Mot de passe</label>
                    <div class="flex items-center border-b border-orange-400 focus-within:border-orange-500">
                        <i class="fas fa-key text-orange-400 mr-3"></i>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none">
                    </div>
                    @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Remember me -->
                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-orange-400 focus:ring-orange-500">
                        <span class="ml-2 text-sm text-gray-300">Se souvenir de moi</span>
                    </label>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit" class="w-full border border-orange-500  hover:text-white hover:bg-orange-500 text-orange-500 py-2 px-4 rounded-2xl transition">Connecter</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>