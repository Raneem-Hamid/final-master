@extends('layouts.master')

@section('content')
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Our Babysitters</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
            </div>

            <div class="row">
                   @foreach ($sitters as $sitter )
                       @php
                             $user = App\Models\User::find($sitter->users_id);
                             $pending=App\Models\Pending::find($sitter->pending_id);
                        @endphp
                  
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{asset('upload/image/'.$user->image)}}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{$user->name}}</h4>
                            @if ($sitter->available==1)
                                <p class="text-success">Available</p>
                            @endif

                            @if ($sitter->available==0)
                                <p class="text-danger">Not Available</p>
                            @endif
                            
                            {{-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> --}}
                            <div class="social">
                                <a class="btn btn-outline-primary px-4 ms-3" href="{{route('sitterprofile', $sitter->id)}}">show profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                       @endforeach
            </div>

        </div>
    </section>
@endsection
