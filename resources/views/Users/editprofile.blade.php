@extends('layouts.master')

@section('head')
    <link href="{{ asset('css/editprofile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('upload/image/' . $editprofile->image) }}" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="165">
                                <form method="post" action="{{ route('updateprofile', $editprofile['id']) }}"
                                    enctype="multipart/form-data">
                                    {{-- @method('PUT') --}}
                                    @csrf
                                    <div class=" d-flex justify-content-center">
                                        <input type="file" class="form-control mt-3" id='image' name='image'
                                            value="{{ old('image', $editprofile['image']) }}">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row mb-3 mt-1">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control"
                                        value="{{ old('name', $editprofile['name']) }}" name='name'>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control"
                                        name='email'value="{{ old('email', $editprofile['email']) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary mb-3">
                                    <input type="text" class="form-control"
                                        name='phone'value="{{ old('phone', $editprofile['phone']) }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
