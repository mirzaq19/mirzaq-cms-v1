<div class="col-md-4">
    <!-- ad widget-->
    <div class="aside-widget text-center">
        <a href="#" style="display: inline-block;margin: auto;">
            <img class="img-responsive" src="{{asset('blog/img/ad-3.jpg')}}" alt="">
        </a>
    </div>
    <!-- /ad widget -->

    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Social Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="#" class="social-facebook">
                        <i class="fa fa-facebook"></i>
                        <span>21.2K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-twitter">
                        <i class="fa fa-twitter"></i>
                        <span>10.2K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-google-plus">
                        <i class="fa fa-google-plus"></i>
                        <span>5K<br>Followers</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach ($categories as $category)
                <li><a href="{{route('cate',$category->slug)}}">{{$category->name}}<span>{{$category->posts->count()}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /category widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Popular Posts</h2>
        </div>
        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href="blog-post.html"><img src="{{asset('blog/img/widget-3.jpg')}}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">Lifestyle</a>
                </div>
                <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
            </div>
        </div>
        <!-- /post -->

    </div>
    <!-- /post widget -->
</div>
