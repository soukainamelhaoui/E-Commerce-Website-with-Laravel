<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function create(){
        $property = Property::all();
        return view('propertyForm', [
                                        'property' => $property,
                                        'user'=>Auth::user()
                                    ]);
    }
    

    public function store(Request $request){
        $property = new Property();
        $id = Auth::id(); 

        $property->title = $request->input('title');
        $property->type = $request->input('type');
        $property->price = $request->input('price');
        $property->country = $request->input('country');
        $property->city = $request->input('city');
        $property->available_rooms = $request->input('avrooms');
        $property->description = $request->input('description');
    
        $property->user_id = $id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $property->image = $filename;
        }

        $property->save();

        return redirect('/');
    }
}