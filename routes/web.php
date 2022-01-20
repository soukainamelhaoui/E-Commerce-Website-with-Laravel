<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/explore');
});

Auth::routes();

Route::get('/explore',function ()
{
    // lists the latest posted properties
    return 'explore init';
});

Route::middleware(['auth'])->group(function(){
    // routes that requires the user to be authenticated 
    Route::get('/dashboard',function ()
    {   
        $user = Auth::user();
        if ($user->admin) {
            return view('adminDashboard',['user'=>$user,'properties'=>$user->properties]);
            
        } else{
            return 'client dashboard';
        }
    });
    Route::get('/profile',[UserController::class,'show']);
    Route::delete('/profile',[UserController::class,'delete']);
    Route::get('/profile/edit',[UserController::class,'edit']);
    Route::put('/profile/edit',[UserController::class,'saveChanges']);
});    

Route::middleware(['auth','isAdmin'])->group(function(){
    // routes that requires the user to be authenticated and an admin 
    Route::get('/property/create',[PropertyController::class, 'create']);
    Route::post('/property',[PropertyController::class, 'store']);
    Route::get('/property/{id}/update',function ()
    {   
        return 'update property view';
    });
    Route::put('/property/{id}',function ()
    {   
        error_log(' property put request');
    });
    Route::delete('/property/{id}',function ()
    {   
        error_log(' property delete request');
    });
    
});