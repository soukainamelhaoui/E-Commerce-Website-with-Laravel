@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            
                        @foreach( $props as $prop )
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- offer image-->
                                    <img class="card-img-top" src="{{ url('images/'.$prop->image) }}" alt="{{$prop->title}}" />
                                    <!-- offer details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $prop->type }}</h5>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                            @for( $i=1 ; $i<= 5 ;$i++)
                                           
                                                <div class="bi-star-fill"></div>
                                                 
                                            @endfor
                                            </div>
                                            <p>{{ $prop->country }}</p>
                                            <!-- offer price price-->
                                            <span> {{ $prop->price_per_night." $"." for 24h"}} </span>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/property/{{$prop->id_property}}">see offer</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            
                        </div>

                    <div class="d-flex justify-content-center">
                        {!! $props->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
