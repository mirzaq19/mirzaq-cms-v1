@extends('dashboards.layout')

@section('title','Category')
@section('menu','Category')
@section('linkmenu',route('category.index'))
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
                <h3>New Category</h3>
            </div>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="newcategory">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="newcategory" placeholder="type new category" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block">Create new category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
