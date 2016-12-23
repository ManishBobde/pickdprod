<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'userName' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'mobileNumber'=>$faker->phoneNumber,
        'age'=>$faker->numberBetween(1,99),
        'sex'=>$faker->boolean(),
        'profilePicUrl'=>$faker->imageUrl(),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->randomElement($array = array ('Admin','Editor','Curator')),
        'slug'=>$faker->slug,
        'description'=>$faker->randomElement($array = array ('admin','editor','curator')),
        'level'=>$faker->randomDigit

    ];
});
$factory->define(App\ContentState::class, function (Faker\Generator $faker) {

    return [
        'stateLabel' => $faker->randomElement($array = array ('Pending', 'InReview', 'Reassign',
            'Discarded', 'Published'))
    ];

});
$factory->define(App\PostType::class, function (Faker\Generator $faker) {

    return [
        'type' => $faker->randomElement($array = array ('text', 'video', 'facts'))
    ];

});
$factory->define(App\Permission::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->randomElement($array = array ('CanCreateUsers',' CanDisableUsers',
            'CanEnableUsers', 'CanDeleteUsers', 'CanSubmit', 'CanReview', 'CanPublish', 'CanDiscard')),
        'slug'=>$faker->slug,
        'description'=>$faker->randomElement($array = array ('CanCreateUsers',' CanDisableUsers',
            'CanEnableUsers', 'CanDeleteUsers', 'CanSubmit', 'CanReview', 'CanPublish', 'CanDiscard')),
        'model'=>$faker->randomDigit
    ];

});
$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'categoryName' => $faker->randomElement($array = array ('Technology',' Adult',
            'Automobiles', 'Fun', 'Facts', 'Food', 'Health', 'Business'))
    ];

});