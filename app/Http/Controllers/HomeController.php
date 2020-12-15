<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;

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
        return view('home');
    }
    public function about() {
        return view('about');
    }
    public function help() {
        return view('help');
    }
    public function daftarmakanan() {
        $makanan = Makanan::all();
        return view('makanan', compact('makanan'));
    }
}
