<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Réinitialiser le cache des permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Liste des permissions
        $permissions = [
            'create books',
            'edit books',
            'delete books',
            'borrow books',
            'return books',
            'create users',
            'edit users',
            'delete users',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Créer les rôles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $gestionnaire = Role::firstOrCreate(['name' => 'gestionnaire']);
        $utilisateur = Role::firstOrCreate(['name' => 'utilisateur']);

        // Donner toutes les permissions à l'admin
        $admin->syncPermissions(Permission::all());

        // Le gestionnaire a presque toutes les permissions sauf "delete users"
        $gestionnaire->syncPermissions(
            Permission::where('name', '!=', 'delete users')->get()
        );

        // L'utilisateur peut seulement emprunter et retourner des livres
        $utilisateur->syncPermissions([
            'borrow books',
            'return books'
        ]);
    }
}
