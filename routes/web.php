<?php
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AppProxyController;

use Illuminate\Support\Facades\Auth;


Route::group(['prefix' => '', 'middleware' => ['verify.shopify']], function () {

    // Route::get('/', function () {
    //     $shop = Auth::user();
    //     $activeThemeID="";
    //     $activeThemeName="";
    //     // $themes=$shop->api()->rest('GET','/admin/api/'.env('SHOPIFY_API_VERSION').'/themes.json')['body']['themes'];
    //     $themes=$shop->api()->rest('GET','/admin/api/2022-10/themes.json')['body']['themes'];
    //     foreach ($themes as $theme)
    //     {
    //         if($theme->role=='main')
    //         {
    //             $activeThemeID=$theme->id;
    //             $activeThemeName=$theme->name;
    //         }
    //     }
    //     echo '<script>window.top.location.href="'.$shop->name.'/'.$activeThemeName.'"</script>';
    // });
    Route::get('/', function () {
        echo '<script>window.top.location.href="shop"</script>';
    });
    // Route::get('/shop' , [StoreController::class,'shop'])->name('shop');
    // Route::get('/' , [StoreController::class,'home'])->name('home');
    // Route::view('/','welcome');
    Route::get('/StoreDetails' , [StoreController::class,'storeDetails'])->name('Store.Details');
    Route::get('/UpdateDB' , [StoreController::class,'updateOptionData'])->name('Update.DB');
    Route::get('/snippetInstall' , [StoreController::class,'snippetInstall'])->name('snippet.create');

    Route::get('/createorder' , [StoreController::class,'createorder'])->name('createorder');
});

Route::group(['prefix' => '', 'middleware' => ['auth.proxy']], function () {
    Route::get('/proxy', [AppProxyController::class,'proxycalled'])->name('proxy');
});





