@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <form method="POST" action="/profile/edit"  enctype="multipart/form-data" >
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-end">First Name </label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $user->firstName }}" required autocomplete="firstName">

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $user->lastName }}" required autocomplete="lastName">

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3 ">
                            <label for="image" class="col-md-4 text-md-end align-self-center">
                                <span class="form-label " >Profile Picture</span>
                            </label>
                                <div class="col-md-6">
                                    <input class="form-control  @error('image') is-invalid @enderror" type="file" name="image" id="image" value="{{ $user->image }}" accept="image/png, image/jpeg" >
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                          </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
