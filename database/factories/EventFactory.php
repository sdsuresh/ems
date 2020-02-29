<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Event::class, function (Faker $faker) {
	static $inc = 1; 
    return [
        'name' => 'Event-'.$inc++,
    ];
});
