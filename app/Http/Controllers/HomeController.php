<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $company = DB::table('companies as c')
                ->join('workplaces as w', 'w.companies_id', '=', 'c.id')
                ->join('assets as a', 'a.workplaces_id', '=', 'w.id')
                ->count();
            $workplace = DB::table('workplaces as w')
                ->join('assets as a', 'a.workplaces_id', '=', 'w.id')
                ->count();
        } else {
            $company = DB::table('companies as c')
                ->join('workplaces as w', 'w.companies_id', '=', 'c.id')
                ->join('assets as a', 'a.workplaces_id', '=', 'w.id')
                ->count();
            $workplace = DB::table('workplaces as w')
                ->join('assets as a', 'a.workplaces_id', '=', 'w.id')
                ->join('users as u', 'u.workplaces_id', '=', 'w.id')
                ->where('u.workplaces_id', $user->workplaces_id)
                ->count();
        }
        return view('home', compact('company', 'workplace'));
    }
}
