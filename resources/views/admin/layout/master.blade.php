<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('module')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    @include('admin.assets.css')

</head>
<body>

    @include('admin.layout.sidebar')

    <div id="right-panel" class="right-panel">

        @include('admin.layout.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">

                        <h1>@yield('module')</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            
            @yield('content')
            
        </div>
    </div>

    @include('admin.assets.js')

    @yield('js')
    
</body>
</html>
