<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        // if(env('APP_DEBUG')) {
        //     \Log::info("This is a message from a AppServiceProvider");
        //     DB::listen(function($query) {
        //         foreach($query->bindings as $bind) {
        //             if ($bind instanceof DateTime) { 
        //                 \Log::info($bind->format('Y-m-d H:i:s'));
        //             } else {
        //                 \Log::info($bind);
        //             }
        //         }
                
        //         // File::append(
        //         //     storage_path('/logs/query.log'),
        //             // $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL); 
        //     });
        // }
    }
}
