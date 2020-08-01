@extends('dashboards.layout')

@section('title','Category')
@section('menu','Category')
@section('linkmenu',route('category.index'))
@section('submenu','Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{route('category.update',$category->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="newcategory">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="newcategory" placeholder="type new category" value="{{$category->name}}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block">Update category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
