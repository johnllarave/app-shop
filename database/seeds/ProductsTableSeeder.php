<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\ProductImage;
use App\User;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
	    /*factory(Category::class, 5)->create();
	    factory(Product::class, 100)->create();
	    factory(ProductImage::class, 200)->create();*/

	    User::create([
        	'name' => 'John',
            'email' => 'prueba@prueba.com',
            'password' => bcrypt('12345678'),
            'admin' => true
        ]);

	    $categories = factory(Category::class, 5)->create(); //Se crean 5 categorias
	    $categories->each(function ($category) { //por cada categoria se ejecuta esta función
	    	$products = factory(Product::class, 20)->make(); // crea 20 productos por categoria
	    	$category->products()->saveMany($products); // hace el registro según la relación $category->$products

	    	 $products->each(function ($p) { //para cada producto se ejecuta esta función
	    	 	$images = factory(ProductImage::class, 5)->make(); // a cada producto se le agrega 5 imagenes
	    	 	$p->images()->saveMany($images);
	    	 });
	    });

	    /*$users = factory(App\User::class, 3)
            ->create()
            ->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });*/
	}
}
