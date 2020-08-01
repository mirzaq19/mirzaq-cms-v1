<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="">
          <img src="{{asset('argon/assets/img/brand/dash.png')}}" class="navbar-brand-img" alt="..." >
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="/dashboard">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#navbar-posts" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="navbar-posts">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Posts</span>
              </a>
              <div class="collapse" id="navbar-posts">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{route('post.index')}}" class="nav-link">List Posts</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('post.create')}}" class="nav-link">Add Posts</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('post.trash')}}" class="nav-link">Trashed Posts</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#navbar-categories" data-toggle="collapse" role="button" aria-expanded="false"
                  aria-controls="navbar-categories">
                  <i class="ni ni-align-left-2 text-default"></i>
                  <span class="nav-link-text">Category</span>
                </a>
                <div class="collapse" id="navbar-categories">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{route('category.index')}}" class="nav-link">List Category</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('category.create')}}" class="nav-link">Create Category</a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#navbar-tags" data-toggle="collapse" role="button" aria-expanded="false"
                  aria-controls="navbar-tags">
                  <i class="ni ni-map-big text-success"></i>
                  <span class="nav-link-text">Tags</span>
                </a>
                <div class="collapse" id="navbar-tags">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{route('tag.index')}}" class="nav-link">List Tags</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('tag.create')}}" class="nav-link">Create Tags</a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-user">
                <i class="ni ni-circle-08 text-dark"></i>
                <span class="nav-link-text">User</span>
              </a>
              <div class="collapse" id="navbar-user">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">List User</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">About</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="/" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">View Blog</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>
