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
                                All Users
                            </h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>role </th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($data as $oneuser)
                                              
                                         
                                        <tr>
                                            <td>
                                                <img src="{{ asset('upload/image/' . $oneuser->image) }}" alt="image" />
                                                <span class="pl-2">{{$oneuser->name}}</span>
                                            </td>
                                            <td>{{$oneuser->phone}}</td>
                                            <td>{{$oneuser->email}}</td>
                                            <td>
                                                <div class="text-success ">
                                                    {{$oneuser->role}} <span class="pl-2"><button data-toggle="modal"
                                                            data-target="#exampleModal{{$oneuser->id}}"><i
                                                                class="mdi mdi-pen "></i></button></span>
                                                </div>

                                            </td>

                                            <div class="modal fade" id="exampleModal{{$oneuser->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$oneuser->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{route('editrole', $oneuser['id'])}}">
                                                                @csrf
                                                                <div class="form-group">
                                                                   <label for="role">Role</label>
                                                                        <select class="form-control" name="role"
                                                                            id="role">
                                                                            <option value="User"
                                                                                @if (old('role', $oneuser['role']) == 'User') selected @endif>
                                                                                User</option>
                                                                            <option value="Admin"
                                                                                @if (old('role', $oneuser['role']) == 'Admin') selected @endif>
                                                                                Admin</option>
                                                                        </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <td><a href="{{ route('deleteuser', $oneuser->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
