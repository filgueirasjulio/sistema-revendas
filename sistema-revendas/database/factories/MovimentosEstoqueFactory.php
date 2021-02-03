<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MovimentosEstoque;
use Faker\Generator as Faker;

$factory->define(MovimentosEstoque::class, function (Faker $faker) {
    return [
        'tipo' => $faker->randomElement(['entrada', 'saida']),
        'quantidade' => $faker->randomNumber($nbDigits = 2),
        'valor' =>  $faker->randomNumber($nbDigits = 1),
        'empresa_id' => 1,
        'produto_id' => 1
    ];
});
