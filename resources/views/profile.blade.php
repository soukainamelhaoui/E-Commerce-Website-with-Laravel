@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/profile.css">


<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary"> 
                 <img src="images/{{$user->image}}" height="100" width="100" />
            </button>
            <span class="name mt-3">{{$user->lastName}} {{$user->firstName}}</span>
            <span class="idd">{{$user->email}}</span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                <span><i class="fa fa-copy"></i></span> 
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                @if ($user->admin)
                <span class="number">3 <span class="follow">Properties</span></span> 
                @else
                <span class="number">3 <span class="follow">Previousely Booked</span></span> 
                @endif
            </div>
            <div class=" d-flex mt-2"> 
                <a href="/profile/edit" class="btn1 btn-warning">Edit Profile</a>
            </div>
            <div class="text mt-3"> <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Nam, placeat repudiandae. Veritatis magnam eum quidem.<br><br> 
                Lorem ipsum dolor sit amet consectetur adipisicing. </span> 
            </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                <span><i class="bi bi-twitter"></i></span> <span><i class="bi bi-facebook"></i></span> 
                <span><i class="bi bi-instagram"></i></span> <span><i class="bi bi-linkedin"></i></span> 
            </div>
            <form action="/profile" method="POST" class="mt-3 d-flex flex-column align-items-center"> 
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger">Delete Profile</button>
                <p class="text-danger mt-2">Careful!! This action is irreversable.</p>
            </form>
            <div class=" px-2 rounded mt-2 date "> 
                <span class="join">Joined {{date('d-m-y',strtotime($user->created_at))}}</span> 
            </div>
        </div>
    </div>
</div>

@endsection
