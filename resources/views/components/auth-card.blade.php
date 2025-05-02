<div class="flex h-screen">
    <!-- Left image and message -->
    <div class="w-1/2 bg-cover bg-center relative" style="background-image: url('/images/bg.jpg')">
        <div class="absolute inset-0 bg-orange-400 opacity-60"></div>
        <div class="absolute bottom-10 left-10 text-white">
            @if (Route::currentRouteName() == 'login')
                <p class="mb-4 text-xl">Si vous n'avez pas un compte</p>
                <a href="{{ route('register') }}" class="border border-white px-4 py-2 rounded">Inscrire</a>
            @else
                <p class="mb-4 text-xl">Si vous avez déjà un compte</p>
                <a href="{{ route('login') }}" class="border border-white px-4 py-2 rounded">Connecter</a>
            @endif
        </div>
    </div>

    <!-- Right form area -->
    <div class="w-1/2 bg-gray-900 text-white flex items-center justify-center">
        <div {{ $attributes->merge(['class' => 'w-2/3']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
