<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropertyController;
use App\Models\Property;


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
            return view('adminDashboard',['user'=>$user]);
            
        } else{
            return 'client dashboard';
        }
    });
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

Route::put('/propertyUpdate/{id_property}', [PropertyController::class, 'update']);