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
								<h2 class="title">Postingan Terbaru</h2>
							</div>
                        </div>
                        @foreach ($posts as $post)
						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{route('pos',$post->slug)}}"><img src="{{asset($post->gambar)}}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{route('cate',$post->category->slug)}}">{{$post->category->name}}</a>
									</div>
                                    <h3 class="post-title"><a href="{{route('pos',$post->slug)}}">{{$post->judul}}</a></h3>

                                    <small class="text-muted">{{$post->excerpt}}</small>
									<ul class="post-meta">
										<li><a href="">{{$post->user->name}}</a></li>
										<li>{{$post->created_at->diffForHumans()}}</li>
									</ul>
                                </div>
							</div>
						</div>
                        <!-- /post -->
                        @if ($loop->iteration%2==0)
                            <div class="clearfix visible-md visible-lg"></div>
                        @endif
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
