<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
Route::group(['prefix'=>'customer','middleware'=>'user'],function(){
    Route::get('home',[CustomerController::class,'customerhome'])->name('customerhome');
});
