<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'paytype'=>$faker->randomElement(['ATM','CreditCard']),
        'orderno'=>$faker->randomElement([date('YmdHis').rand(10000,99999)]),
        'gametype'=>$faker->randomElement(['測試服','正式服']),
        'gameid'=>$faker->lastName,
        'gamename'=>$faker->name,
        'ip'=>$faker->ipv4,
        'amount'=>$faker->randomElement([100,200,300,500,1000,3000]),
        'rate'=>$faker->randomElement([1,1.5,2,3,0.5]),
        // 'donepay'=>FALSE,
        // 'donetime'=>$faker->boolean($chanceOfGettingTrue = 50),
        // 'status'=>$faker->boolean($chanceOfGettingTrue = 50),
        'handlingfee'=>$faker->numberBetween(10,10),
        'remark'=>$faker->word
    ];
});
