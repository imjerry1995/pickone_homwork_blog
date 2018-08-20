<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Jerry's Blog - @yield('title')</title>
</head>
<body>
    @include('partials.nav')
    <div class="container">
        <div class="row">
            @section('sidebar')
                @include('partials.sidebar')
            @show
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>
</html>