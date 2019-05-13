<?php

use Faker\Generator as Faker;

use Jvdw\Analytics\Models\AppAnalyticsEvent;
use Jvdw\Analytics\Models\AppMetric;

$factory->define(AppAnalyticsEvent::class, function(Faker $faker) {
    $metric = AppMetric::first() ?? factory(AppMetric::class)->create();

    return [
        'device_id' => $faker->asciify('****************'),
        'metric_id' => $metric->id
    ];
});