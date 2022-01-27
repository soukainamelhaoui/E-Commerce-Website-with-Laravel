<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;



class ReservationController extends Controller
{
    
    public function create($id){
        return view('reservationForm', ['user'=>Auth::user(),'propertyId'=>$id]);

    }
    
    public function store(Request $request,$id){
        $reservation = new Reservation();
        $userId = Auth::id(); 
 
        $reservation->first_name = $request->input('first_name');
        $reservation->last_name = $request->input('last_name');
        $reservation->email = $request->input('email');
        $reservation->number = $request->input('number');
        $reservation->guests = $request->input('guests');
        $reservation->check_in = $request->input('check_in');
        $reservation->check_out = $request->input('check_out');
        $reservation->special_requests = $request->input('special_requests');
        $reservation->property_id = $id;
        $reservation->user_id = $userId;

       
        $reservation->save();
        
        return redirect('/explore');
    }
   
}