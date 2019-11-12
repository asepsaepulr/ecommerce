<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;

class ProductController extends Controller
{
	  public function index()
	  {
    $product =Products::all();
        return response()->json($product,200);
    }
}
