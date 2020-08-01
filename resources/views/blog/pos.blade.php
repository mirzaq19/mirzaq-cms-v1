@extends('blog.layout')

@section('content')
@include('blog.partial.pageheader')
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- post share -->
					<div class="section-row">
						<div class="post-share">
							<a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
							<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
							<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
							<a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
						</div>
					</div>
					<!-- /post share -->

					<!-- post content -->
					<div class="section-row">
                        <h3>{{$post->judul}}</h3>
                        <img src="{{asset($post->gambar)}}" alt="head" width="100%" style="margin-bottom: 10px">
                        {!!$post->content!!}
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
							<ul>
                                <li>TAGS:</li>
                                @foreach ($post->tags as $tag)
								    <li><a href="{{route('tag.post',$tag->slug)}}">{{$tag->name}}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
					<!-- /post tags -->

                    @include('blog.partial.postauthor')
				</div>
				@include('blog.partial.widget')
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection
