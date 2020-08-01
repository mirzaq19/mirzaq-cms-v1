@extends('dashboards.layout')

@section('title','Tag')
@section('menu','Tags')
@section('linkmenu',route('tag.index'))
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
                <h3>New Tag</h3>
            </div>
            <div class="card-body">
                <form action="{{route('tag.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="newtag">Tag Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="newtag" placeholder="type new tag" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block">Create new tag</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
