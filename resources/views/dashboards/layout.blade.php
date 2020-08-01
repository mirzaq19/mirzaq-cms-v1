<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | @yield('title')</title>
    @yield('beforecss')
    @include('dashboards.partial._head')
    @yield('aftercss')
</head>

<body>
  <!-- Sidenav -->
  @include('dashboards.partial._sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('dashboards.partial._navbar')
    <!-- Header -->
    @include('dashboards.partial._header')
    <!-- Page content -->
    <div class="container-fluid mt--6">

        @yield('content')
        <!-- Footer -->
        @include('dashboards.partial._footer')
    </div>
  </div>

  @yield('beforescript')
  @include('dashboards.partial._script')
  @yield('afterscript')

</body>
</html>
