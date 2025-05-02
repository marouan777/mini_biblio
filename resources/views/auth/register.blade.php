<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <style>
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px #1f2937 inset !important;
            /* bg-gray-800 */
            -webkit-text-fill-color: white !important;
            transition: background-color 9999s ease-in-out 0s;
        }
    </style>
</head>

<body class="h-screen flex">

    <!-- Formulaire à gauche -->
    <div class="w-full md:w-1/2 w-1/2 bg-gray-900 text-white px-6 overflow-y-auto d-flex items-center justify-between">
        <div class="w-full py-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-12" >
                <!-- Nom -->
                <div class="mb-5">
                    <label for="name" class="block text-sm text-orange-400 mb-1">Nom complet</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-user text-orange-400 mr-3"></i>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre nom complet">
                    </div>
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm text-orange-400 mb-1">Adresse e-mail</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-envelope text-orange-400 mr-3"></i>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre adresse e-mail">
                    </div>
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block text-sm text-orange-400 mb-1">Mot de passe</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-lock text-orange-400 mr-3"></i>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre mot de passe">
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm text-orange-400 mb-1">Confirmer le mot de passe</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-lock text-orange-400 mr-3"></i>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Confirmez votre mot de passe">
                    </div>
                </div>

                <!-- CIN -->
                <div class="mb-5">
                    <label for="cin" class="block text-sm text-orange-400 mb-1">CIN</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-id-card text-orange-400 mr-3"></i>
                        <input
                            id="cin"
                            name="cin"
                            type="text"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre CIN">
                    </div>
                </div>

                <!-- Adresse -->
                <div class="mb-5">
                    <label for="adresse" class="block text-sm text-orange-400 mb-1">Adresse</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-map-marker-alt text-orange-400 mr-3"></i>
                        <input
                            id="adresse"
                            name="adresse"
                            type="text"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre adresse">
                    </div>
                </div>

                <!-- Téléphone -->
                <div class="mb-5">
                    <label for="telephone" class="block text-sm text-orange-400 mb-1">Téléphone</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-phone text-orange-400 mr-3"></i>
                        <input
                            id="telephone"
                            name="telephone"
                            type="text"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre numéro de téléphone">
                    </div>
                </div>

                <!-- Département -->
                <div class="mb-5">
                    <label for="departement" class="block text-sm text-orange-400 mb-1">Département</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-building text-orange-400 mr-3"></i>
                        <input
                            id="departement"
                            name="departement"
                            type="text"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre département">
                    </div>
                </div>

                <!-- Filière -->
                <div class="mb-5">
                    <label for="filiere" class="block text-sm text-orange-400 mb-1">Filière</label>
                    <div class="flex items-center border-b border-orange-400">
                        <i class="fas fa-graduation-cap text-orange-400 mr-3"></i>
                        <input
                            id="filiere"
                            name="filiere"
                            type="text"
                            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
                            placeholder="Entrez votre filière">
                    </div>
                </div>

                <!-- Statut -->
                <div class="mb-6">
                    <label class="block text-sm text-orange-400 mb-2">Statut</label>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="statut" value="etudiant" class="form-radio text-orange-500" checked>
                            <span>Étudiant(e)</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="statut" value="professeur" class="form-radio text-orange-500">
                            <span>Professeur</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="statut" value="externe" class="form-radio text-orange-500">
                            <span>Personne / Externe</span>
                        </label>
                    </div>
                </div>
                </div>
                <!-- Submit -->
                <div class="mt-6">
                    <button type="submit" class="w-full border border-orange-400 text-orange-400 hover:bg-orange-500 hover:text-white py-2 rounded transition">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Image à droite -->
    <div class="hidden md:block w-1/2 relative bg-cover bg-center" style="background-image: url('/images/biblio_register.jpg')">
        <div class="absolute inset-0 bg-gradient-to-t from-orange-500 to-transparent opacity-80"></div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white text-center">
            <p class="text-xl mb-5 text-shadow">Vous avez déjà un compte ?</p>
            <a href="{{ route('login') }}" class="border border-white px-16 py-2 rounded-2xl shadow-lg hover:bg-white hover:text-orange-500 transition">Se connecter</a>
        </div>
    </div>

</body>

</html>