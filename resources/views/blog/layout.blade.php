<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mirzaq Code's</title>
    @include('blog.partial.head')
</head>

<body>
    @include('blog.partial.header')

    @yield('content')

    @include('blog.partial.footer')
    @include('blog.partial.script')

</body>

</html>
