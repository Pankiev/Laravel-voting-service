<?php

namespace App\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use View;
use \Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('radioIfValid', function($expression)
        {
            $data = json_decode($expression);
            $questionAnswerId = $data[0];
            $userId = $data[1];
            return Form::radio('votedAnswer', $questionAnswerId);
        });



        View::composer('*', function($view) {
            $view->with('user', Auth::user());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Laravel
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
