<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\City;
use App\Country;
use App\Currency;
use App\Search;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name'       => $faker->city,
        'airport_code' => 'CPH',
        'country_id'    => '1',
    ];
});


$factory->define(Country::class, function (Faker $faker) {
    return [
        'name'       => 'Denmark',
        'country_code' => 'DK',
        'currency_id'    => '1',
    ];
});


$factory->define(Currency::class, function (Faker $faker) {
    return [
        'currency_symbol'       => 'kr',
        'exchange_rate' => '0.0016150112822260964',
        'currency_code'    => 'DKK',
        'base'    => '2500000',
    ];
});


$factory->define(Search::class, function (Faker $faker) {
    return [
        'budget' => '1000',
        'city'    => 'Copenhagen',
        'currency'    => 'DKK',
        'city_id'    => '1',
    ];
});


