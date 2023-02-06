@extends('layouts.master')

@section('head')
    <link href="{{ asset('css/sitterprofile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    @php
                        $user = App\Models\User::find($sitter->users_id);
                        $pending = App\Models\Pending::find($sitter->pending_id);
                        $kind = App\Models\Kind::find($pending->kinds_id);
                    @endphp

                    <div class="text-center">
                        <img src="{{asset('upload/image/'.$user->image)}}" class="rounded-circle" width="200">
                    </div>

                    <div class="text-center mt-3">
                        {{-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> --}}
                        <h5 class="mt-2 mb-0">{{ $user->name}}</h5>
                        <span>{{ $kind->name }}</span>

                        <div class="px-4 mt-1">
                            <p class="fonts">
                            {{$sitter->description}}    
                            </p>

                        </div>



                        <div class="buttons">

                            <a class="btn btn-outline-primary px-4" href="mailto:{{$user->email}}">message</a>
                            @if ($sitter->available==1)
                                <a class="btn btn-outline-primary px-4 ms-3">Booking</a>
                            @endif
                            
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
@endsection
