<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create($id){

        return view('bookingForm', ['user'=>Auth::user(),'propertyId'=>$id]);
    }

    public function store($id){
        $booking = new Booking();

        $booking->first_night = request('first_night');
        $booking->nights = request('nights');
        $booking->property_id = $id;
        $booking->user_id = Auth::user()->id;
        
        return redirect('/dashboard');
    }

    public function delete($propertyId,$bookingId){
        // basically cancelling a booking
        $booking = Booking::findOrFail($bookingId);

        $booking->delete();
        
        return redirect('/property/'.$propertyId);
    }
    
}