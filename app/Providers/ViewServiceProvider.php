<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\View;
// use App\Models\Contact;
// use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    //     log::info('ViewServiceProvider boot method called.');
    //     View::composer('adminincludes.topnavigation',function($view){
    //     $message=Contact::latest()->first();
    //     $timeelapsed=$message?$message->created_at->differForHumans(Carbon::now()):"no messages";
    //     $view->with('timeelapsed',$timeelapsed);
    // });
    // View::composer('adminincludes.footerontent',function($view){
    //     $message=Contact::latest()->first();
    //     $timeelapsed=$message?$message->created_at->differForHumans(Carbon::now()):"no messages";
    //     $view->with('timeelapsed',$timeelapsed);
    // });
}
}