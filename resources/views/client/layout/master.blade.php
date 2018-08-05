<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    
    @include('client.assets.css')

</head>
<body>
    
    @include('client.layout.header')

    <div class="main">
        
        @yield('content')

    </div>
    
    @include('client.layout.footer')
    
    @include('client.assets.js')
    
    @yield('js')
    
</body>
</html>
