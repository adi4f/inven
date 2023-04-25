<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

use App\Models\Masters\Company;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authorize;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:company read', ['only' => ['index', 'show']]);
        $this->middleware('can:company create', ['only' => ['create', 'store']]);
        $this->middleware('can:company update', ['only' => ['edit', 'update']]);
        $this->middleware('can:company delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Company::filter(Request::only('search'));
        if (Request::has('sort_by')) {
            $query = $query->orderBy(Request::input('sort_by'), Request::input('sort_dir', 'asc'));
        }

        return Inertia::render('Masters/Companys/index', [
            'filters' => Request::all('search', 'per_page', 'sort_by', 'sort_dir'),
            'companys' => $query->paginate(Request::input('per_page', 5)),
            'can' => [
                'create' => Auth::user()->can('company create'),
                'update' => Auth::user()->can('company update'),
                'delete' => Auth::user()->can('company delete'),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Masters/Companys/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Validator::make(Request::all(), [
            'initial' => ['min:3', 'required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            
        ])->validate('storeData');

        $insert = Company::create([
            'initial' => Request::get('initial'),
            'description' => Request::get('description'),
            'name' => Request::get('name'),
            'address' => Request::get('address'),
            'province' => Request::get('province'),
            'city' => Request::get('city'),
            'postal_code' => Request::get('postal_code'),
            'web' => Request::get('web'),
            'email' => Request::get('email'),
            'telephone' => Request::get('telephone'),
            'fax' => Request::get('fax'),
        ]);

        return Redirect::route('companys.index');
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
    public function edit(Company $company)
    {
        return Inertia::render('Masters/Companys/edit', [
            'editData' => [
                'id' => $company->id,
                'initial' => $company->initial,
                'description' => $company->description,
                'name' => $company->name,
                'address' => $company->address,
                'province' => $company->province,
                'city' => $company->city,
                'postal_code' => $company->postal_code,
                'web' => $company->web,
                'email' => $company->email,
                'telephone' => $company->telephone,
                'fax' => $company->fax,
            ],
            'can' => [
                'update' => Auth::user()->can('company update'),
                'delete' => Auth::user()->can('company delete'),
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
        Validator::make(Request::all(), [
            'initial' => ['min:3', 'required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            
        ])->validate('updateData');

        $company->update([
            'initial' => Request::get('initial'),
            'description' => Request::get('description'),
            'name' => Request::get('name'),
            'address' => Request::get('address'),
            'province' => Request::get('province'),
            'city' => Request::get('city'),
            'postal_code' => Request::get('postal_code'),
            'web' => Request::get('web'),
            'email' => Request::get('email'),
            'telephone' => Request::get('telephone'),
            'fax' => Request::get('fax'),
        ]);

        return Redirect::route('companys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        
        return Redirect::route('companys.index');
    }
}
