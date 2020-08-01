@extends('blog.layout')

@section('content')

<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">List Post : </h2>
							</div>
                        </div>
                        @foreach ($posts as $post)
					<!-- post -->
					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="{{asset($post->gambar)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{$post->category->slug}}">{{$post->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('pos',$post->slug)}}">{{$post->judul}}</a></h3>
							<ul class="post-meta">
								<li><a href="">{{$post->user->name}}</a></li>
								<li>{{$post->created_at->diffForHumans()}}</li>
                            </ul>
                            <a href=""><small class="blockquote">{{$post->excerpt}}</small></a>
							<p>{{\Illuminate\Support\Str::limit(strip_tags($post->content),$limit=200,$end='...')}}</p>
						</div>
					</div>
					<!-- /post -->
                        @endforeach
					</div>
                    <!-- /row -->
				</div>
                @include('blog.partial.widget')
			</div>
            <!-- /row -->
            {{ $posts->links() }}
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection
