@extends('layouts.app')

@section('content')
         
<div class="container">
    <div class="col-md-12">
        <div class="card">
           <div class="card-header">
               <h4 class="card-title">table reservation </h4>

           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table">
                       <thead class="text-primary">
                       <th>first name</th>
                       <th>last name</th>
                       <th>email</th>
                       <th>number</th>
                       <th>guests</th>
                       <th>check_in </th>
                       <th>check_out</th>
                      
                       <th>special_requests</th>
                    
                       </thead>
                       <tbody>
                         @foreach($reservations as $reservation)
                           <tr>
                               <td>{{$reservation->first_name}}</td>
                               <td>{{$reservation->last_name}}</td>
                               <td>{{$reservation->email}}</td>
                               <td>{{$reservation->number}}</td>
                               <td>{{$reservation->guests}}</td>
                               <td>{{$reservation->check_in}}</td>
                               <td>{{$reservation->check_out}}</td>
                               <td>{{$reservation->special_requests}}</td>
                               
                           </tr>
                           @endforeach
                       </tbody>
                       
                       
                    </table>
                    <div class="d-flex justify-content-center">
                     {!! $reservations->links() !!}
                 </div>
               </div>
           </div>
        </div>
    </div>
</div>
</div>

    
@endsection
