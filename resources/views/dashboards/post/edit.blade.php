@extends('dashboards.layout')

@section('title','Posts')
@section('menu','Posts')
@section('linkmenu',route('post.index'))
@section('submenu','Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>Edit Post</h3>
            </div>
            <div class="card-body">
                <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="judulpost">Judul Pos</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judulpost" placeholder="Judul Pos" value="{{$post->judul}}" autofocus>
                        @error('judul')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="exceptpost">Excerpt</label>
                        <input type="text" name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" id="exceptpost" placeholder="Excerpt" value="{{$post->excerpt}}">
                        @error('excerpt')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="categorypost">Kategori Pos</label>
                        <select name="kategori" id="categorypost" class="form-control @error('kategori') is-invalid @enderror">
                            <option disabled selected>pilih category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if($post->category->id == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputtag">Pilih Tag</label>
                        <select class="form-control select2" id="inputtag" name="tags[]" multiple="multiple">
                          @foreach ($tags as $tag)
                            <option value="{{$tag->id}}"
                                @foreach ($post->tags as $match)
                                    @if ($tag->id == $match->id)
                                        selected
                                    @endif
                                @endforeach
                                >{{$tag->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label class="form-control-label" for="contentpost">Konten Pos</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="contentpost" placeholder="Content Pos">{{$post->content}}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="gambarpost">Gambar Thumbnail</label>
                        <img src="{{asset($post->gambar)}}" alt="{{$post->slug}}" class="d-block my-2 img-fluid" width="450px">
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambarpost" accept=".jpg,.jpeg,.png">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="statuspos">Status Pos</label>
                        <select name="status" id="statuspos" class="form-control">
                            <option value="0" @if($post->status == 0) selected @endif>Draft</option>
                            <option value="1" @if($post->status == 1) selected @endif>Published</option>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block">Update post</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('afterscript')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        // CKEDITOR.replace('contentpost')
        // ClassicEditor
        //     .create( document.querySelector( '#contentpost' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );
        $(document).ready(function() {
        $('#contentpost').summernote();
        });
    </script>
@endsection
