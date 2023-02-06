@extends('Admin.dashboard')
@section('head')
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/modal/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal/flaticon.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5>Revenue</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">$32123</h2>
                                        <p class="text-success ml-2 mb-0 font-weight-medium">
                                            +3.5%
                                        </p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">
                                        11.38% Since last month
                                    </h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5>Sales</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">$45850</h2>
                                        <p class="text-success ml-2 mb-0 font-weight-medium">
                                            +8.3%
                                        </p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">
                                        9.61% Since last month
                                    </h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5>Purchase</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">$2039</h2>
                                        <p class="text-danger ml-2 mb-0 font-weight-medium">
                                            -2.1%
                                        </p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">
                                        2.27% Since last month
                                    </h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Applications to join the working group
                            </h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $oneapp)
                                            @php
                                                $user = App\Models\User::find($oneapp->users_id);
                                            @endphp

                                            <tr>
                                                <td>

                                                    <img src="{{ asset('upload/image/' . $user->image) }}" alt="image" />
                                                    <span class="pl-2">{{ $user->name }}</span>
                                                </td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>

                                                    @if ($oneapp->status == 'Approved')
                                                        <div class="text-success ">
                                                            {{ $oneapp->status }}
                                                        </div>
                                                    @endif

                                                    @if ($oneapp->status == 'Pending')
                                                        <div class="text-warning">
                                                            {{ $oneapp->status }}
                                                        </div>
                                                    @endif

                                                    @if ($oneapp->status == 'Rejected')
                                                        <div class="text-danger ">
                                                            {{ $oneapp->status }}
                                                        </div>
                                                    @endif

                                                </td>
                                                <td><button class="btn btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal{{ $oneapp->id }}">Edit</button>
                                                </td>

                                                <div class="modal fade" id="exampleModal{{ $oneapp->id }}" tabindex="-1"
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
                                                                <iframe src="{{ $oneapp->certificate }}" frameborder="0"
                                                                    width="100%" height="400px"
                                                                    style="overflow: hidden"></iframe>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="mb-2">{{ $oneapp->overview }}</p>
                                                                <form method="POST"
                                                                    action="{{ route('editpending', $oneapp['id']) }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="active">Status</label>
                                                                        <select class="form-control" name="status"
                                                                            id="status">
                                                                            <option value="Pending"
                                                                                @if (old('status', $oneapp['status']) == 'Pending') selected @endif>
                                                                                Pending</option>
                                                                            <option value="Approved"
                                                                                @if (old('status', $oneapp['status']) == 'Approved') selected @endif>
                                                                                Approved</option>
                                                                            <option value="Rejected"
                                                                                @if (old('status', $oneapp['status']) == 'Rejected') selected @endif>
                                                                                Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kind">kind Of Sitter</label>
                                                                        <select class="form-control" name="kinds_id"
                                                                            id="kinds_id">
                                                                            <option value=1
                                                                                @if (old('kinds_id', $oneapp['kinds_id']) === 1) selected @endif>
                                                                                Junior</option>
                                                                            <option value=2
                                                                                @if (old('kinds_id', $oneapp['kinds_id']) === 2) selected @endif>
                                                                                Standard</option>
                                                                            <option value=3
                                                                                @if (old('kinds_id', $oneapp['kinds_id'])=== 3) selected @endif>
                                                                                Advanced</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Add A sitter
                                                                            Description</label>
                                                                        <textarea name="description" class="form-control">Qualified sitter subject to all steps of training</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $user->id }}">
                                                                    </div>
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
                                                <td><a href="{{ route('deletepending', $oneapp->id) }}"
                                                        class="btn btn-sm btn-danger">Delete</a>
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
