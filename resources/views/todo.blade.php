@extends('layouts.app')

@section('content')

<div class="jumbotron " style="margin-top: 100px;">
    <h3 style="text-align: center">Simple Todo List</h3>
    <div class="row">
        <div class="col-md-6">

            <form method="post" action="{{ route('todo') }}" autocomplete='off'>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your todo name with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Description" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <div class="col-md-6">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $do)
                    <tr>

                        <td>{{ $loop->index +1}}</td>
                        <td>{{ $do->name }}</td>
                        <td>{{ $do->description }}</td>
                        <div class="modal fade" id="myModal{{$do->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalTitle">Edit: {{$do->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <!--Modal content-->
                                        <form action="{{url('edit/'.$do->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required value="{{$do->name}}">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your todo name with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Description" required 
                                                value="{{$do->description}}">
                                            </div>

                                            <button type="submit" id="editbtn" class="btn btn-primary btn-sm">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td class="d-flex">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal{{$do->id}}">
                                Edit
                            </button>
                            <form action="{{url('delete/'.$do->id)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection