<?php

use App\Models\Assisted;
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

$factory->define(Assisted::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'social_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cpf' => $faker->numberBetween(999999999),
        'birth_date' => $faker->date(),
        'rg' => $faker->unique()->text(11),
        'rg_issuer' => 'SSP',
        'gender' => 'male',
        'marital_status' => 'single',
        'schooling' => 'illiterate',
        'naturalness' => 'Brasileiro',
        'profession' => 'Teste',
        'note' => null,
        'uf' => 'PR',
        'city' => 'Guarapuava',
        'number' => '123',
        'street' => 'Teste',
        'postcode' => '85015310',
        'complement' => '',
        'neighborhood' => 'Batel',
        'social_programs' => $faker->randomFloat(2, 1, 10),
        'social_security_contribution' => $faker->randomFloat(2, 1, 10),
        'income_tax' => $faker->randomFloat(2, 1, 10),
        'alimony' => $faker->randomFloat(2, 1, 10),
        'extraordinary_expenses' => $faker->randomFloat(2, 1, 10),
        'residence_kind' => 'house',
        'residence_situation' => 'owned',
        'rental_value' => $faker->randomFloat(2, 1, 10)
    ];
});
