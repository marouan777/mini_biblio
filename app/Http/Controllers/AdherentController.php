<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdherentController extends Controller
{
    public function index()
    {
        return view('adherents.index');
    }
    public function index_status($statut = null)
    {
        $adherents = User::whereHas('status', function ($q) use ($statut) {
            if ($statut) {
                $q->where('name', $statut);
            }
        })->get();

        return view('adherents.index', compact('adherents', 'statut'));
    }

    public function create()
    {
        return view('adherents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cin' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'matiere' => 'nullable|string',
            'departement' => 'nullable|string',
            'filiere' => 'nullable|string',
            'statut' => 'required|in:etudiant,professeur,externe',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin' => $request->cin,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'matiere' => $request->matiere,
            'departement' => $request->departement,
            'filiere' => $request->filiere,
        ]);

        $user->status()->create([
            'name' => $request->statut
        ]);

        return redirect()->route('adherents.index')->with('success', 'Adhérent ajouté avec succès.');
    }
}
