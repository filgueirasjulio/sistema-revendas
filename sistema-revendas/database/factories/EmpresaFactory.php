<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'tipo' => $faker->randomElement(['cliente', 'fornecedor']),
        'nome' => $faker->company,
        'razao_social' => $faker->company,
        'documento'=> $faker->cnpj(false),
        'ie_rg' => $faker->rg,
        'nome_contato' => $faker->name,
        'celular' => $faker->cellPhoneNumber(false),
        'email' => $faker->unique()->safeEmail,
        'cep' => $faker->randomNumber(8, true),
        'logradouro' => $faker->streetName,
        'bairro'=> $faker->citySuffix,
        'cidade' => $faker->city,
        'estado' =>  mb_strtoupper($faker->lexify(str_repeat('?', 2))),
    ];
});
