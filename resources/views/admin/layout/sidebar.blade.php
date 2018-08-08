<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><img src="{{ asset('bower_components/sufee-admin-dashboard/images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="#"><img src="{{ asset('bower_components/sufee-admin-dashboard/images/logo2.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('admin.index') }}"> <i class="menu-icon fa fa-dashboard"></i>
                        @lang('admin.dashboard')
                    </a>
                </li>
                <h3 class="menu-title">
                    @lang('admin.manager')
                </h3>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>@lang('admin.user.users')</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-list-ul"></i>
                            <a href="{{ route('admin.users.index') }}">@lang('admin.user.list')</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-list-alt"></i>
                        @lang('admin.category.categories')
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-plus-square"></i>
                            <a href="{{ route('admin.categories.create') }}">
                                @lang('admin.category.add')
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-list-ul"></i>
                            <a href="{{ route('admin.categories.index') }}">
                                @lang('admin.category.list')
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-list-alt"></i>
                        @lang('admin.article.articles')
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-list-ul"></i>
                            <a href="{{ route('admin.product.list') }}">
                                @lang('admin.article.list')
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-list-alt"></i>
                        @lang('admin.reports.list')
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-list-ul"></i>
                            <a href="{{ route('admin.reports.index') }}">
                                @lang('admin.reports.list')
                            </a>
                        </li>
                    </ul>
                 </li>
                <h3 class="menu-title">@lang('admin.system.system')</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="{{ route('admin.config.index') }}"> <i class="menu-icon fa fa-gear"></i>
                        @lang('admin.system.config')
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
