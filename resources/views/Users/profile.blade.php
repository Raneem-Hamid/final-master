@extends('layouts.master')

@section('head')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet"  href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet"  href="{{asset('vendors/css/vendor.bundle.base.css')}}">
@endsection

@section('content')
    <div class="row gutters-sm mt-3">
        <div class="col-md-4 mb-3 ml-3">
            <div class="card ">
                <div class="card-body ">
                    <div class="d-flex flex-column align-items-center text-center ">
                        <img src="{{asset('upload/image/' 
                         .  Auth::user()->image
                        )}}" alt="Admin" class="rounded-circle"
                            width="190">
                        <div class="mt-3">
                           
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           {{ Auth::user()->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           {{ Auth::user()->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ Auth::user()->phone }}
                        </div>
                    </div>
                    <hr>
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="
                            {{route('editprofile',Auth::user()->id)}}
                            ">Edit</a>
                        </div>
                    </div>
                </div>
            </div>

          


        </div>
    </div>

    </div>
    </div>
<div  class="d-flex justify-content-center mb-3">
    <div class="col-lg-11 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">your Appointments</h4>
                    
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>The Sitter Name</th>
                            <th>The Sitter Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>John</td>
                            <td>Premier</td>
                            <td>Photoshop</td>
                            <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                            <td><label class="text-danger">canceled</label></td>
                          </tr>
                          <tr>
                            <td>Peter</td>
                            <td>After effects</td>
                            <td>Photoshop</td>
                            <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                            <td><label class="text-success">Completed</label></td>
                          </tr>
                          <tr>
                            <td>Dave</td>
                            <td>53275535</td>
                            <td>Photoshop</td>
                            <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                            <td><label class="text-warning">Pending</label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
@endsection
