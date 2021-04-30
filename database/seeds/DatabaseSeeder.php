<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Role;
use App\JobUser;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Profile::class, 200)->create()->each(function($u) {
            $u->user()->save(factory(App\User::class)->make());
          });

        // factory('App\User',10)->create();
        factory('App\Company',25)->create();
        factory('App\Job', 150)->create();
        // factory('App\JobUser',150)->create();


        // $users = factory(App\User::class, 10)
        //            ->create()
        //            ->each(function ($user) {
        //                 $user->jobs()->save(factory(App\Job::class)->make());
        //             });
        
        Category::truncate();
        $categories = [

            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'

        ];
        Category::truncate();
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }

        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);
        if(!User::where('email', '=', 'admin@gmail.com')->exists()) {
            $admin = User::create([
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('password123'),
                'email_verified_at'=>NOW()
            ]);
            $admin->roles()->attach($adminRole);    
        }
       }
}
