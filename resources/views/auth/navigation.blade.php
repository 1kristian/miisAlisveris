@if (Auth::check())
<!-- The user is logged in... -->
<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <strong class="caret"></strong></a>
            <ul class="dropdown-menu scrollable-menu">
                <li>
                    <a>{{ trans('auth/navigation.welcome_text') }} {{ Auth::user()->name }}</a>
                </li>
                @role('admin')
                <li>
                    <a href="{{ url('admin/home') }}">{{ trans('auth/navigation.admin') }}</a>
                </li>
                @endrole
                <li>
                    <a href="{{ url('profile') }}">{{ trans('auth/navigation.profile') }}</a>
                </li>
                <li>
                    <a href="{{ url('logout') }}">{{ trans('auth/navigation.logout') }}</a>
                </li>
            </ul>
        </li>
</ul>
<!-- The user is logged in... -->

@else
<ul class="nav navbar-nav navbar-right">
        <li>
            <a href="{{ url('login') }}">{{ trans('auth/navigation.login') }}</a>
        </li>
        <li>
            <a href="{{ url('register') }}">{{ trans('auth/navigation.register') }}</a>
        </li>
</ul>
@endif
