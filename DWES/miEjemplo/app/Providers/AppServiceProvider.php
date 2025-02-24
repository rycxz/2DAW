<?php

namespace App\Providers;

use App\Models\Usuario;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Auth::viaRequest('admin',function(Request $request){
            if(is_null($request->user())){
                return null;
            }
            else{
                if($request->user()->esAdmin==1){
                    return $request->user();
                }
                else{
                    return null;
                }
            }
        });

    }
}
