@extends('dashboards.layout')

@section('title','Post')
@section('menu','Post')
@section('linkmenu',route('post.index'))
@section('submenu','Trashed')

@section('content')
<div class="row justify-content-center">
    <div class="col-md">
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
    <div class="col-md">
        @if (Session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Berhasil!</strong> {{Session('delete')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h1>Trashed Post</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Trashed post : {{$posts->count()}}</p>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title Post</th>
                                <th scope="col">Author</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                            <tr>
                                <td> {{$key +$posts->firstitem()}} </td>
                                <td>{{$post->judul}}</td>
                                <td>{{$post->excerpt}}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center"><img src="{{asset($post->gambar)}}" alt="{{$post->slug}}" width="120px"></td>
                                <td>
                                    <a href="{{route('post.restore',$post->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Restore</a>
                                    <form action="{{route('post.kill',$post->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus post ini secara permanen?')"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if ($posts->count() == 0)
                                <tr class="text-center">
                                    <td colspan="6">Tidak ada data dalam database</td>
                                </tr>
                            @endif
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Pos</th>
                                <th scope="col">Author</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        {{$posts->links()}}
    </div>
</div>
@endsection
