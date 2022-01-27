@extends('layouts.app')

@section('content')



<div class="container">



<div class="row">
        <div class="col-md-5 first-text">
            <h1 class="text-left">Make Your Reservation</h1>
            
        </div>
    
        <div class="col-md-7">
            <div class="card second-text">
                <h3 class="text-center mb-4"> Reservation Information</h3>
                
                <form action="/property/{{$propertyId}}/reservation" method="POST" enctype="multipart/form-data">
                @csrf

                          
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-3 col-form-label text-md-end">Full Name</label>
                        <div class="col-md-4">
                            <input type="text" id="first_name" name="first_name" placeholder="first name" class="form-control" required>
                        </div>
                       
                        <div class="col-md-4">
                            <input type="text" id="last_name" name="last_name"  placeholder="last name" class="form-control" required>
                        </div>
                    </div>
                    

                   
                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>
                        <div class="col-md-8">
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="number" class="col-md-3 col-form-label text-md-end">Number</label>
                        <div class="col-md-8">
                            <input type="text" id="number" name="number" class="form-control" required>
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="guests" class="col-md-3 col-form-label text-md-end">Number of Guests</label>
                        <div class="col-md-8">
                            <input type="number" id="guests" min=1 step=1 max=10 id="guests" name="guests" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="check_in" class="col-md-3 col-form-label text-md-end">Check In</label>
                        <div class="col-md-8">
                            <input type="date" min=0 id="check_in" name="check_in" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="check_out" class="col-md-3 col-form-label text-md-end">Check Out</label>
                        <div class="col-md-8">
                            <input type="date" min=0 id="check_out" name="check_out" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="special_requests" class="col-md-3 col-form-label text-md-end">Special Requests</label>
                        <div class="col-md-8">
                            <textarea type="text" id="special_requests" name="special_requests" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </form>
                
            </div>
        
    </div>
</div>

<style>
    h1{
        margin-top: 200px;
        font-size: 40px;
    }

    p{
        font-size: 20px;
    }

    .card{
        padding: 30px 15px;
        
        box-shadow: 2px 4px 15px 1px grey;
        
    }

    body{
        background-color: #F2F2F2;
    }

    .container{
        color: #4C4C4C;
    }

    form{
        color: #393939;

    }


</style>



@endsection