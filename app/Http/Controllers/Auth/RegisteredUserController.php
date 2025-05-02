<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Valider les données
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cin' => ['required', 'string', 'max:20'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:15'],
            'departement' => ['nullable', 'string', 'max:255'],
            'filiere' => ['nullable', 'string', 'max:255'],
            'statut' => ['required', 'string', 'in:etudiant,professeur,externe'],
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin' => $request->cin,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'departement' => $request->departement,
            'filiere' => $request->filiere,
        ]);

        // Enregistrer le statut dans la table `status` via la relation morphique
        $user->status()->create([
            'name' => $request->statut,
        ]);

        // Déclencher l'événement d'inscription
        event(new Registered($user));

        // Connecter l'utilisateur
        Auth::login($user);

        // Rediriger vers le tableau de bord
        return redirect(route('dashboard'));
    }
}
