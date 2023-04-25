<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Permission::with(['role_has_permissions.roles'])->filter($request->only('search'));
        if ($request->has('sort_by')) {
            $query = $query->orderBy($request->input('sort_by'), $request->input('sort_dir', 'asc'));
        }

        return Inertia::render('Admins/Permissions/index', [
            'filters' => $request->all('search', 'per_page'),
            'permissions' => $query->paginate($request->input('per_page', 10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admins/Permissions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validateWithBag('storeData', [
            'name' => ['required', 'max:255', Rule::unique('permissions')],
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return Inertia::render('Admins/Permissions/edit', [
            'editData' => [
                'id' => $permission->id,
                'name' => $permission->name,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Permission $permission, Request $request)
    {
       
        $request->validateWithBag('updateData', [
            'name' => ['required', 'max:255', Rule::unique('permissions')->ignore($permission->id)],
        ]);

        $permission->update($request->only('name'));

        
        return redirect()->route('admin.permissions.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index');
    }
}
