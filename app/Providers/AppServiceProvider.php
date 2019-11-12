<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Auth;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('frontEnd.header' ,function ($view) {
            if (Auth::guest()){

            }else{
                $cart = DB::table('cart')
                ->join('products','products.id','=', 'cart.product_id')
                ->join('users','cart.user_id','=', 'users_id')
                ->select('cart.*','products.p_name as p_name ','p_price','p_color','image')
                ->where('user_id',Auth::User()->id)
                    ->get();
                    $view->with(compact('cart'));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
