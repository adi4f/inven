<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $query = Role::with(['role_has_permissions.permissions'])->filter($request->only('search'));
        if ($request->has('sort_by')) {
            $query = $query->orderBy($request->input('sort_by'), $request->input('sort_dir', 'asc'));
        }

        return Inertia::render('Admins/Roles/index', [
            'filters' => $request->all('search', 'per_page'),
            'roles' => $query->paginate($request->input('per_page', 10))
        ]);
    }

    public function create()
    {
        return Inertia::render('Admins/Roles/create', [
            'permissions' => Permission::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validateWithBag('storeData', [
            'name' => ['required', 'max:255', Rule::unique('roles')],
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        if ($request->get('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return Inertia::render('Admins/Roles/edit', [
            'editData' => [
                'id' => $role->id,
                'name' => $role->name,
                'permissions' => $role->permissions->pluck('name'),
            ],
            'permissions' => Permission::orderBy('name')->get(),
        ]);
    }

    public function update(Role $role, Request $request)
    {
        // if ($role->name == 'admin') {
        //     return redirect()->back();
        // }

        $request->validateWithBag('updateData', [
            'name' => ['required', 'max:255', Rule::unique('roles')->ignore($role->id)],
        ]);

        $role->update($request->only('name'));

        if ($request->get('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        // if ($role->name == 'admin') {
        //     return redirect()->back();
        // }

        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
