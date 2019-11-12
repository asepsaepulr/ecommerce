<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;
use App\Galeri;
use App\Artikel;

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
       $categories = Category::get();
       $products = Products::get();
       $galeri = Galeri::get();
       $artikel =Artikel::get();
       return View('home', compact('categories', 'products', 'galeri','artikel'));
   }
}
