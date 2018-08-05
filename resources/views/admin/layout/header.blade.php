<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">

                    {!! Form::open([
                        'url' => 'foo/bar', 
                        'class' => 'search-form']) 
                    !!}

                    {!! Form::text('email', @lang('admin.search'), ['class' => 'form-control mr-sm-2']) !!}
                    {!! Form::submit('Search', ['class' => 'search-close']) !!}
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ asset('bower_components/sufee-admin-dashboard/images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#">
                        <i class="fa fa-power -off"></i>
                        @lang('auth.logout')
                    </a>
                </div>
            </div>

            <div class="language-select dropdown" id="language-select">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                    <i class="flag-icon flag-icon-us"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="language" >
                    <div class="dropdown-item">
                        <span class="flag-icon flag-icon-us"></span>
                    </div>
                    <div class="dropdown-item">
                        <i class="flag-icon flag-icon-vn"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

</header>
