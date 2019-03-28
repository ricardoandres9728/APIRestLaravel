<?php

use App\Category;
use App\Product;
use App\Seller;
use App\Transaction;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verified' => $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarTokenVerificacion(),
        'admin' => $faker->randomElement([User::USUARIO_REGULAR, User::USUARIO_ADMINISTRADOR]),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),

    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::PRODUCTO_NO_DISPONIBLE, Product::PRODUCTO_DISPONIBLE]),
        'image' => 'https://picsum.photos/200/300',
        'seller_id' => User::inRandomOrder()->first()->id,

    ];
});

$factory->define(Transaction::class, function (Faker $faker) {

    $vendedor = Seller::has('products')->get()->random();
    $comprador = User::all()->except($vendedor->id)->random();


    return [
        'quantity' => $faker->numberBetween(1, 10),
        'buyer_id' => $comprador->id,
        'product_id' => $vendedor->products->random()->id,
    ];
});

