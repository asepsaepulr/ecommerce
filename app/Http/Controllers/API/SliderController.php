<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeri;

class SliderController extends Controller
{
	public function index()
	{
		$slider =Galeri::all();
		return response()->json($slider,200);
	}
}
