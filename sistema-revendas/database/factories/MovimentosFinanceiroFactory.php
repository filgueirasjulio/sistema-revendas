<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Models\MovimentosFinanceiro;

$factory->define(MovimentosFinanceiro::class, function (Faker $faker) {
    return [
        'descricao' => $faker->sentence,
        'valor' =>  $faker->randomNumber($nbDigits = 2),
        'tipo' => $faker->randomElement(['entrada', 'saida']),
    ];
});
