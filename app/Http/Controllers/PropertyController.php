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
                                        'property' => $property
                                        
                                    ]);
    }

    public function delete($id_property){
        $id_property = Property::find($id_property);
        $id_property->delete();
        return redirect('/explore');

    }
    

    public function store(Request $request){
        $property = new Property();
        $id = Auth::id(); 

        $property->title = $request->input('title');
        $property->type = $request->input('type');
        $property->price_per_night = $request->input('price');
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

        return redirect('/dashboard');
    }

    public function edit($id_property){
        $property = Property::find($id_property);
        return view('editProperty', [
            'property' => $property
            
        ]);
    }

    public function update($id_property){
        $property = Property::find($id_property);
        $property->title = request('title');
        $property->type = request('type');
        $property->price_per_night = request('price');
        $property->available_rooms = request('avrooms');
        $property->description = request('description');

        $property->update();

        return redirect('/')->with('mssg', 'Property Updated Successfuly');
    }

}