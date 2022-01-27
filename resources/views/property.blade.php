@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-5">
                                <div><img class="d-block w-100" src="{{ asset('images/'.$property->image) }}" alt="image here"></div>
                            </div>
                            <div class="col-md-7">
                                <p class="text-center">property #{{ $property->id_property }}</p>
                                <h2>{{ $property->title }}</h2>
                                <h4>{{ $property->country }} - {{ $property->city }}</h4>
                                <p>{{ $property->description }}</p>
                                <p class="price"><b>Price:</b> {{ $property->price }} MAD</p>
                                <button type="button" class="btn btn-warning buy">Book Now</button>
                                
                            </div>
                        </div>
                             
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body{
        background-color: #F2F2F2;
    }
    

    .price{
        font-size: 20px;
        color: #FF8C00;
    }

    .price b{
        color: black;
    }


    .buy{
        margin: 20px 10px;
        padding: 10px 20px;
    }

    .card{
        padding: 30px 15px;
        box-shadow: 2px 4px 15px 1px grey;
    }
</style>
@endsection