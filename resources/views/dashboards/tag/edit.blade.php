@extends('dashboards.layout')

@section('title','Tag')
@section('menu','Tag')
@section('linkmenu',route('tag.index'))
@section('submenu','Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Edit Tag</h3>
            </div>
            <div class="card-body">
                <form action="{{route('tag.update',$tag->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="newtag">Tag Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="newtag" placeholder="type new tag" value="{{$tag->name}}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block">Update tag</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
