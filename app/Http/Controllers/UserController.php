<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $propertiesNumber = sizeof($user->properties);
        
        return view('profile',['user'=>$user,'propertiesNumber'=>$propertiesNumber]);
    }

    public function edit()
    {
        return view('profileEdit',['user'=>Auth::user()]);
    }
    
    public function saveChanges()
    {
        $user = User::findOrFail(Auth::user()->id);

        $userInput = [
            'firstName'=>request('firstName'),
            'lastName'=>request('lastName'),
            'image'=>request('image'),
        ];


        if ($userInput['image']) {
            error_log(print_r($userInput));
            $imageName = time().'.'.$userInput['image']->extension();
            $userInput['image']->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }

        $user->firstName = $userInput['firstName'];
        $user->lastName = $userInput['lastName'];
        
        $user->save();

        return redirect('/profile');
    }

    public function delete()
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->delete();

        return redirect('/register');
    }
}