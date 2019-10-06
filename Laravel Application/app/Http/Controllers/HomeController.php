<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['registerLand']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function registerLand()
    {
        $townShips = Township::all();
        return view('land.register', compact('townShips'));
    }

    public function viewTrxChain()
    {
        return view('land.transactions');
    }
}
