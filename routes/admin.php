<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('home',[AdminController::class,'adminhome'])->name('adminhome');
    Route::group(['prefix'=>'category'],function(){
Route::get('list',[CategoryController::class,'list'])->name('categorylist');
Route::post('create',[CategoryController::class,'created'])->name('created');
Route::get('delete/{id}',[CategoryController::class,'deleted'])->name('deleted');
Route::get('update/{id}',[CategoryController::class,'updated'])->name('updated');
Route::post('update/{id}',[CategoryController::class,'edit'])->name('edit');
    });
    Route::group(['prefix'=>'profile'],function(){
        Route::get('changepassword',[ProfileController::class,'changepasswordpage'])->name('changepasswordpage');
        Route::post('changepassword',[ProfileController::class,'changepassword'])->name('changepassword');
        Route::get('/',[ProfileController::class,'profile'])->name('profile');
        Route::get('edit',[ProfileController::class,'editprofile'])->name('editprofile');
        Route::post('update',[ProfileController::class,'updateprofile'])->name('updateprofile');
        Route::group(['middleware'=>'superadmin'],function(){
            Route::get('add/newAdmin',[ProfileController::class,'createadminpage'])->name('createadminpage');
        Route::post('add/newAdmin',[ProfileController::class,'createadmin'])->name('createadmin');
        Route::get('admin/list',[ProfileController::class,'adminlist'])->name('adminlist');
        Route::get('admin/delete/{id}',[ProfileController::class,'deleteadmin'])->name('deleteadmin');
        Route::get('user/list',[ProfileController::class,'userlist'])->name('userlist');
        Route::get('user/delete/{id}',[ProfileController::class,'deleteuser'])->name('deleteuser');
        });
        Route::get('payment',[PaymentController::class,'paymentpage'])->name('paymentpage');
        Route::post('create',[PaymentController::class,'payment'])->name('payment');
        Route::get('delete/{id}',[PaymentController::class,'deleted'])->name('deletepayment');
        Route::get('update/{id}',[PaymentController::class,'updated'])->name('updatepayment');
        Route::post('update/{id}',[PaymentController::class,'edit'])->name('edit');
    });
Route::group(['prefix'=>'product'],function(){
    Route::get('create',[ProductController::class,'product'])->name('product');
    Route::post('create',[ProductController::class,'create'])->name('productcreate');
    Route::get('list/{amt?}',[ProductController::class,'productlist'])->name('productlist');
    Route::get('update/{id}',[ProductController::class,'productupdate'])->name('productupdatepage');
    Route::post('update/{id}',[ProductController::class,'update'])->name('productupdate');
});
});
