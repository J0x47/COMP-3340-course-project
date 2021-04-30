<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Job;
use App\Profile;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'user_type'=> $faker->randomElement([User::TYPE_JOBSEEKER, User::TYPE_RECRUITER, User::TYPE_SYSADMIN]),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'education' => 'Bachelor',
        'contact_number' => $faker->e164PhoneNumber,

    ];
});





$factory->define(App\Company::class, function (Faker $faker) {
    return [
    	'recruiter_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    	'cname' => $name=$faker->company,
        'email' => $faker->unique()->safeEmail,
    	'slug' => str_slug($name),
        'address' => $faker->address,
        'tel' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'website' =>$faker->domainName,
        'logo' => 'man.jpg',
        'cover_photo'=> 'tumblr-image-sizes-banner.png',
        'slogan' => 'learn-earn and grow',
        'description' => $faker->paragraph(rand(2,10)),
    ];
});


$factory->define(App\Job::class, function (Faker $faker) {
    return [
        // 'user_id' =>App\User::all()->random()->id,
        'recruiter_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        // 'company_id'=>App\Company::all()->random()->id,
        'company_id'=> function() {
            return factory(App\Company::class)->create()->id;
        },
        'job_title'=>$title=$faker->jobTitle,
        'slug'=>str_slug($title),
        // 'region_id'=>$faker->address,
        // 'city_id'=>$faker->address,
        'category_id'=> rand(1,5),
        'job_type'=> $faker->randomElement([Job::JOB_TYPE_FULLTIME, Job::JOB_TYPE_PARTTIME, Job::JOB_TYPE_CONTRACT, Job::JOB_TYPE_INTERSHIP]),
        'description'=>$faker->paragraph(rand(2,10)),
        'due_date'=>$faker->dateTimeBetween($startDate = '2019-08-22 02:10:20', $endDate = '2019-10-02 02:10:20', $timezone = null),
        'number_of_vacancy'=>rand(1,10),
        'experience'=>rand(1,10),
        'gender'=>$faker->randomElement(['male', 'female']),
        'salary'=>rand(7000,20000),
        'created_at'=>$c_time = $faker->dateTimeBetween($startDate = '-205 days', $endDate = '2019-08-02 02:10:20', $timezone = null), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
        'updated_at'=> $c_time,
    ];
});




// $factory->define(App\JobUser::class, function (Faker $faker) {
//     return [
//         // 'user_id' =>App\User::all()->random()->id,
//         'user_id' => function() {
//             return factory(App\User::class)->create()->id;
//         },
//         // 'job_id' =>App\Job::all()->random()->id,
//         'job_id' => function() {
//             return factory(App\Job::class)->create()->id;
//         },
//         'created_at'=>$c_time = $faker->dateTimeBetween($startDate = '2019-01-01 02:10:20', $endDate = '2019-08-02 02:10:20', $timezone = null), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
//         'updated_at'=> $c_time,
//     ];
// });