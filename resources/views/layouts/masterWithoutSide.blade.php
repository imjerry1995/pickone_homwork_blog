<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Jerry's Blog - @yield('title')</title>
</head>
<body>
    @include('partials.nav')
    <div class="adjust" style="margin-top:50px"></div>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>
</html>