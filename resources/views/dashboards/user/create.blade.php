@extends('dashboards.layout')

@section('title','User')
@section('menu','User')
@section('linkmenu',route('user.index'))
@section('submenu','Create')

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
                <h3>Create New user</h3>
            </div>
            <div class="card-body">
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="inputname">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputname" placeholder="Name" value="{{old('name')}}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputemail">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputemail" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputtipe">Role User</label>
                        <select name="role" id="inputtipe" class="form-control @error('role') is-invalid @enderror">
                            <option selected disabled>Choose role..</option>
                            <option value="0">Writer</option>
                            <option value="1">Administrator</option>
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
                    <div class="form-group">
                        <label class="form-control-label" for="inputpassword2">Password Confimation</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputpassword2" placeholder="Email">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Create new user</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
