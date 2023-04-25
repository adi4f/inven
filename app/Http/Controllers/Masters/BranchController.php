<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

use App\Models\Masters\Branch;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authorize;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:branch read', ['only' => ['index', 'show']]);
        $this->middleware('can:branch create', ['only' => ['create', 'store']]);
        $this->middleware('can:branch update', ['only' => ['edit', 'update']]);
        $this->middleware('can:branch delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Branch::filter(Request::only('search'));
        if (Request::has('sort_by')) {
            $query = $query->orderBy(Request::input('sort_by'), Request::input('sort_dir', 'asc'));
        }

        return Inertia::render('Masters/Branchs/index', [
            'filters' => Request::all('search', 'per_page', 'sort_by', 'sort_dir'),
            'companys' => $query->paginate(Request::input('per_page', 5)),
            'can' => [
                'create' => Auth::user()->can('branch create'),
                'update' => Auth::user()->can('branch update'),
                'delete' => Auth::user()->can('branch delete'),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
