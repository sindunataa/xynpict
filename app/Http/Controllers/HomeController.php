<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeries;
use App\Models\Albums;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $galeries = Galeries::latest()->simplePaginate(8);
        $galery = Galeries::all();
        $album = Albums::get();
        $user = User::get();

        $count_galery = $galery->count();
        $count_album = $album->count();
    
        return view('pages.dashboard',compact('galeries', 'galery', 'album', 'count_galery', 'count_album', 'user'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
