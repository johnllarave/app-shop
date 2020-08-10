<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome(){

    	$products = Product::all(); // consulta para traer todos los datos de la tabla
    	return view('welcome')->with(compact('products')); //compact = crea arreglo asociativo
    }
}
