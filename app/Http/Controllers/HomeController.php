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
        $this->middleware('auth')->except(['index','details']);
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
        $chalets_count = Chalet::where('owner_id', \Auth::id())->count();
	    $orders_count = \DB::table('orders')->join('chalets', function ($join) {
            		$join->on('chalets.id', '=', 'orders.chalet_id')
                 	->where('chalets.owner_id', '=', \Auth::id());
			})->count();
        return view('stats',['chalets_count'=>$chalets_count,'orders_count'=>$orders_count ]);
    }
    public function details($id)
    {
        $chalet = Chalet::with(['attributes', 'media','prices'])->findOrFail($id);
        //dd($chalet);
        return view('details', ['chalet' => $chalet]);
    }
}
