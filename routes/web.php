<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Property;
use App\Models\Reservation;
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
    $props = Property::latest()->paginate(8);
    
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
    $props = Property::where('country',$country)->latest()->paginate(8);
    $user = Auth::user();
    
    return view('search',['user'=>$user,'props'=>$props]);
});

Route::middleware(['auth'])->group(function(){
    // routes that requires the user to be authenticated 
    Route::get('/dashboard',function ()
    {   
        $user = Auth::user();
        if ($user->admin) {
            $props = Property::where('user_id',$user->id)->latest()->paginate(8);
            return view('adminDashboard',['user'=>$user,'props'=>$props]);
            
        } else{
            $reservations = Reservation::where('user_id',$user->id)->latest()->paginate(4);
            return view('clientDashboard', ['reservations' => $reservations,'user'=>Auth::user()]);
        }
    });
    Route::get('/profile',[UserController::class,'show']);
    Route::delete('/profile',[UserController::class,'delete']);
    Route::get('/profile/edit',[UserController::class,'edit']);
    Route::put('/profile/edit',[UserController::class,'saveChanges']);
});    

Route::get('/property/{id_property}', [PropertyController::class, function($id_property){
    $property = Property::find($id_property);
    return view('property', ['property' => $property,
                            ]);
}]);
Route::post('/property',[PropertyController::class, 'store']);

Route::middleware(['auth','isAdmin'])->group(function(){
    // routes that requires the user to be authenticated and an admin 
    Route::get('dashboard/propertyForm',[PropertyController::class, 'create']);
    
    Route::get('/dashboard/editProperty/{id_property}', [PropertyController::class, 'edit']);
    Route::put('/property/{id}',function ()
    {   
        error_log(' property put request');
    });
    Route::delete('/property/{id}', [PropertyController::class, 'delete']);
    
});

Route::middleware(['auth','isNotAdmin'])->group(function(){
    // routes that requires the user to be authenticated and not an admin 
    Route::get('/property/{id}/reservation',[ReservationController::class, 'create']);
    Route::post('/property/{id}/reservation',[ReservationController::class, 'store']);
    
});
Route::put('/propertyUpdate/{id_property}', [PropertyController::class, 'update']);
