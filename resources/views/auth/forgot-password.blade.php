<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <style>
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

<body class="h-screen flex items-center justify-center bg-gray-900 text-white" style="background-image: url('/images/biblio_forget_password.jpg'); background-size: cover; background-position: center;">
    <div class="w-full max-w-md px-6 py-8 bg-gray-800 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-orange-400 mb-6 text-center">
            🔒 Réinitialiser le mot de passe
        </h2>

        <p class="mb-4 text-sm text-gray-400 text-center">
            Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </p>

        <!-- Session Status -->
        @if (session('status'))
        <div class="mb-4 text-green-500 text-center">
            {{ session('status') }}
        </div>
        @endif
        
        @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <!-- Formulaire -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Adresse e-mail -->
            <div class="mb-5">
                <label for="email" class="block text-sm text-orange-400 mb-1">Adresse e-mail</label>
                <div class="flex items-center border-b border-orange-400 focus-within:border-orange-500">
                    <i class="fas fa-envelope text-orange-400 mr-3"></i>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                        placeholder="Entrez votre adresse e-mail">
                </div>
                @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bouton Envoyer -->
            <div class="mt-6">
                <button type="submit" class="w-full border border-orange-500 hover:bg-orange-500 hover:text-white text-orange-500 py-2 px-4 rounded-2xl transition">
                    Envoyer le lien de réinitialisation
                </button>
            </div>
        </form>
    </div>
</body>

</html>