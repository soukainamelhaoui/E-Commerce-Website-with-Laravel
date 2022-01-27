@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-5 first-text">
            <h1 class="text-left">Edit Your Property</h1>
        </div>
    
        <div class="col-md-7">
            <div class="card second-text">
                <h3 class="text-center mb-4">Property Information</h3>
                        <form action="/propertyUpdate/{{ $property->id_property }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        

                        <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Property Title</label>
                        <div class="col-md-6">
                            <input type="text" id="title" name="title" class="form-control" value="{{ $property->title }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="type" class="col-md-4 col-form-label text-md-end">Propety Type</label>
                        <div class="col-md-6">
                            <input type="radio" class="btn-check" id="hotel" name="type" class="form-control" value="hotel" checked>
                            <label class="btn btn-outline-primary" for="hotel">Hotel</label>
                            <input type="radio" class="btn-check" id="villa" name="type" class="form-control" value="villa">
                            <label class="btn btn-outline-primary" for="villa">Villa</label>
                            <input type="radio" class="btn-check" id="appartement" name="type" class="form-control" value="appartement">
                            <label class="btn btn-outline-primary" for="appartement">Appartement</label>
                        </div>
                    </div>
        
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">Price</label>
                        <div class="col-md-6">
                            <input type="number" min=0.01 step=0.01 id="price" name="price" class="form-control" value="{{ $property->price }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                        <div class="col-md-6">
                            <textarea type="text" id="description" name="description" class="form-control" value="{{ $property->description }}" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="avrooms" class="col-md-4 col-form-label text-md-end">Available Rooms</label>
                        <div class="col-md-6">
                            <input type="number" min=0 id="avrooms" name="avrooms" class="form-control" placeholder="{{ $property->available_rooms }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Confirm Property Changes</button>
                        </div>
                    </div>

                </form>
                                    
                <div class="row mb-0">
                        <form action="/property/{{ $property->id_property }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <div class="col-md-6 mb-3 offset-md-4">
                                <button class="btn btn-danger" type="submit">DELETE PROPERTY</button>
                            </div>                
                        </form>
                </div>
                
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