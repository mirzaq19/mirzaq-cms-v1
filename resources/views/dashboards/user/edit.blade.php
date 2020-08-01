@extends('dashboards.layout')

@section('title','User')
@section('menu','User')
@section('linkmenu',route('user.index'))
@section('submenu','Edit')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        @if (Session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Berhasil!</strong> {{Session('status')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Edit user</h3>
            </div>
            <div class="card-body">
                <form action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="inputname">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputname" placeholder="Name" value="{{$user->name}}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputemail">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputemail" placeholder="Email" value="{{$user->email}}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputtipe">Role User</label>
                        <select name="role" id="inputtipe" class="form-control @error('role') is-invalid @enderror">
                            <option value="0" @if($user->role == 0) selected @endif>Writer</option>
                            <option value="1" @if($user->role == 1) selected @endif>Administrator</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputpassword">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputpassword" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Edit data user</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
