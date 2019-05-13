<?php

use Faker\Generator as Faker;

use Jvdw\Analytics\Models\AppMetric;

$factory->define(AppMetric::class, function(Faker $faker) {
    return [
        'name' => $faker->name
    ];
});