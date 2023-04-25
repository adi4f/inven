<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

use App\Models\Menu;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index()
    {
        $query = Menu::filter(Request::only('search'));
        if (Request::has('sort_by')) {
            $query = $query->orderBy(Request::input('sort_by'), Request::input('sort_dir', 'asc'));
        }

        return Inertia::render('Admins/Companys/index', [
            'filters' => Request::all('search', 'per_page', 'sort_by', 'sort_dir'),
            'companys' => $query->paginate(Request::input('per_page', 5))
        ]);
    }
}
