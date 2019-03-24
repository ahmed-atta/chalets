<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chalet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $chalets = Chalet::with(['attributes', 'media','prices'])->orderBy('id', 'desc')->paginate(10);
        return view('home', ['chalets' => $chalets]);
    }

    public function dashboard(){

        return view('dashboard');
    }
}
