@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a Lodeging</div>
                <div class="card-body">
                        <form action="/" method="POST" enctype="multipart/form-data">
                        @csrf

                          
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Property Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="title" name="title" class="form-control" required>
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
                                <label for="location" class="col-md-4 col-form-label text-md-end">Location</label>
                                <div class="col-md-6">
                                    <input type="text" id="location" name="location" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                                <div class="col-md-6">
                                    <input type="file" id="image" name="image" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">Price</label>
                                <div class="col-md-6">
                                    <input type="text" id="price" name="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                                <div class="col-md-6">
                                    <textarea type="text" id="description" name="description" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="avrooms" class="col-md-4 col-form-label text-md-end">Available Rooms</label>
                                <div class="col-md-6">
                                    <input type="avrooms" id="avrooms" name="avrooms" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Add Lodeging</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection