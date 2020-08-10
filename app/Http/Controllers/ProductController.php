<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	public function index () {
		$products = Product::paginate(10);
		return view('admin.products.index')->with(compact('products')); //vista del listado de productos
	}

	public function create () {
		return view('admin.products.create'); //Ver formulario de registro
	}

	public function store (Request $request) {
		//Validar datos
		//Personalización de los mensajes de error
		$messages = [
			'name.required' => 'Debe ingresar el nombre del producto',
			'name.min' => 'El producto debe tener 3 caracteres',
			'description.required' => 'Debe ingresar la description',
			'description.max' => 'El producto no debe tener mas de 200 caracteres',
			'price.required' => 'Debe ingresar el valor del producto',
			'price.numeric' => 'El dato debe ser numerico',
			'price.min' => 'El valor no puede ser negativo'
		];

		//Reglas de las validaciones
		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0'
		];

		//Función para la validación del formulario, recibe 3 parametros
		$this->validate($request, $rules, $messages);

		// Registrar nuevo producto
		//dd($request->all());

		$product = new Product();

		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save(); //INSERT

		return redirect('/admin/products');
	}

	public function edit ($id) {
		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product'));; //Ver formulario de registro
	}

	public function update (Request $request, $id) {
		//Registrar nuevo producto
		//dd($request->all());

		$product = Product::find($id);

		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save(); //UPDATE

		return redirect('/admin/products');
	}

	public function destroy ($id) {
		$product = Product::find($id);
		$product->delete(); //DELETE

		return back();
	}

}
