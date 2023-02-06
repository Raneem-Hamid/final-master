@extends('Admin.dashboard')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                All Sitters
                            </h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sitter Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Kind</th>
                                            <th>Available</th>
                                            <th>Certificate & Description</th>
                                            {{-- <th>Description</th> --}}
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $onesitter)
                                            @php
                                                $user = App\Models\User::find($onesitter->users_id);
                                                $pending=App\Models\Pending::find($onesitter->pending_id);
                                                $kind = App\Models\Kind::find($pending->kinds_id);

                                            @endphp

                                            <tr>
                                                <td>
                                                    <img src="{{asset('upload/image/'.$user->image)}}" alt="image" />
                                                    <span class="pl-2">{{ $user->name }}</span>
                                                </td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>{{ $kind->name }}</td>
                                                <td>
                                                @if ($onesitter->available==1)
                                                    Available
                                                @else
                                                    Not  Available
                                                @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#Modal{{ $onesitter->id }}">
                                                        View 
                                                    </button>
                                                </td>

                                                 <div class="modal fade" id="Modal{{ $onesitter->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    {{ $user->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="mdi mdi-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center"
                                                                style="width: 100%">
                                                                <iframe src="{{ $pending->certificate }}" frameborder="0"
                                                                    width="100%" height="400px"
                                                                    style="overflow: hidden"></iframe>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="mb-2">{{ $onesitter->description }}</p>
                                                                <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <td>{{$onesitter->description}}</td> --}}
                                                <td><button data-toggle="modal"
                                                        data-target="#exampleModal{{ $onesitter->id }}" class="btn btn-sm btn-primary">Edit</button>
                                                </td>

                                                 <div class="modal fade" id="exampleModal{{ $onesitter->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    {{ $user->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="mdi mdi-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('editkd', $onesitter['id']) }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="kinds_id">kind Of Sitter</label>
                                                                        <select class="form-control" name="kinds_id"
                                                                            id="kinds_id">
                                                                            
                                                                            <option value=1
                                                                                @if (old('kinds_id', $pending['kinds_id']) == 1) selected @endif>
                                                                                Junior</option>
                                                                            <option value=2
                                                                                @if (old('kinds_id', $pending['kinds_id']) == 2) selected @endif>
                                                                                Standard</option>
                                                                            <option value=3
                                                                                @if (old('kinds_id', $pending['kinds_id']) == 3) selected @endif>
                                                                                Advanced</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Add A sitter Description</label>
                                                                       <textarea name="description" class="form-control" >{{old('description',$onesitter['description'])}}</textarea>
                                                                    </div>
                                                                   <input type="hidden" name="pending_id" value="{{$onesitter->pending_id}}">
                                                                    <div class="modal-footer">
                                                                        {{-- <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button> --}}
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <td><a href="{{ route('deletesitter', $onesitter->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
    @endsection
