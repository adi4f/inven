<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\facades\Redirect;
use illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use spatie\Permission\Models\Role;
use Inertia\Inertia;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::with(['roles'])->filter($request->only('search', 'role'));
        if ($request->has('sort_by')) {
            $query = $query->orderBy($request->input('sort_by'), $request->input('sort_dir', 'asc'));
        }

        return Inertia::render('Admins/Users/index', [
            'filters' => $request->all('search', 'role', 'per_page', 'sort_by', 'sort_dir'),
            'users' => $query->paginate($request->input('per_page', 10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admins/Users/create', [
            'roles' => Role::orderBy('name')->get(),
        ]);
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
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            
            'guard_name' => 'web',
        ]);

        if ($request->get('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index');
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
    public function edit(User $user)
    {
        return Inertia::render('Admins/Users/edit', [
            'editData' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'roles' => $user->roles->pluck('name'),
            ],
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $request->validateWithBag('updateData', [        
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        $user->update($request->only('name'));
        $user->update($request->only('email'));
        $user->update($request->only('password'));

        if ($request->get('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
