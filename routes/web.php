<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Models\Property;
use Illuminate\Http\Request;

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
    $props = Property::orderBy('updated_at')->paginate(8);
    
    return view('home',['props'=>$props,'user'=>Auth::user()]);
});

Auth::routes();

Route::get('/explore',function ()
{
    // lists the latest posted properties
    return redirect('/');
});

Route::post('/country',function(){
    
    return redirect('/country/?country='.request('country'));
});

Route::get('/country',function(Request $request){
    $country = $request->query('country');
    $props = Property::where('country',$country)->orderBy('updated_at')->paginate(8);
    $user = Auth::user();
    
    return view('search',['user'=>$user,'props'=>$props]);
});

Route::middleware(['auth'])->group(function(){
    // routes that requires the user to be authenticated 
    Route::get('/dashboard',function ()
    {   
        $user = Auth::user();
        $props = Property::where('user_id',$user->id)->orderBy('updated_at')->paginate(8);
        if ($user->admin) {
            return view('adminDashboard',['user'=>$user,'props'=>$props]);
            
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

Route::middleware(['auth','isNotAdmin'])->group(function(){
    // routes that requires the user to be authenticated and not an admin 
    Route::get('/property/{id}/booking',[BookingController::class, 'create']);
    Route::post('/property/{id}/booking',[BookingController::class, 'store']);
    Route::delete('/property/{propertyId}/booking/{bookingId}',[BookingController::class, 'delete']);
    
});