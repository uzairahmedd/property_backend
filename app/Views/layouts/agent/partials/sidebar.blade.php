<div class="account-siderbar-area">
    <div class="author-image text-center">
        <img src="{{ asset(Auth::user()->avatar) }}" alt="">
    </div>
    <div class="author-name text-center">
        <h4>{{ Auth::user()->name }}</h4>
        <span>{{ __('Credits') }} <b>{{ Auth::user()->credits }}</b></span>
    </div>
    <div class="dashboard-menu">
        <nav>
            <ul>
                <li><a class="{{ Request::is('agent/dashboard') ? 'active' : '' }}" href="{{ route('agent.dashboard') }}"><span class="iconify" data-icon="feather:home" data-inline="false"></span> <span>{{ __('Dashboard') }}</span></a></li>

                <li><a class="{{ Request::is('agent/property*') ? 'active' : '' }}" href="{{ route('agent.property.index') }}"><span class="iconify" data-icon="teenyicons:search-property-outline" data-inline="false"></span> <span>{{ __('My properties') }}</span></a></li>
                <li><a class="{{ Request::is('agent/review') ? 'active' : '' }}" href="{{ route('agent.review.index') }}"><span class="iconify" data-icon="bx:bx-heart" data-inline="false"></span> <span>{{ __('My Reviews') }}</span></a></li>
                <li><a class="{{ Request::is('agent/favourites') ? 'active' : '' }}" href="{{ route('agent.favourite.index') }}"><span class="iconify" data-icon="bx:bx-heart" data-inline="false"></span> <span>{{ __('My Favorites') }}</span></a></li>

                <li><a class="{{ Request::is('agent/package') ? 'active' : '' }}" href="{{ route('agent.package.index') }}"><span class="iconify" data-icon="octicon:package-24" data-inline="false"></span> {{ __('Packages') }}</span></a></li>

                <li><a class="{{ Request::is('agent/agency') ? 'active' : '' }}" href="{{ route('agent.agency.index') }}"><span class="iconify" data-icon="feather:users" data-inline="false"></span>  <span>{{ __('Agency') }}</span></a></li>

                <li><a class="{{ Request::is('agent/profile/settings') ? 'active' : '' }}" href="{{ route('agent.profile.settings') }}"><span class="iconify" data-icon="ant-design:user-outlined" data-inline="false"></span> <span>{{ __('My Profile') }}</span></a></li>

                <li><a class="{{ Request::is('agent/transaction') ? 'active' : '' }}" href="{{ route('agent.transaction') }}"><span class="iconify" data-icon="uil:transaction" data-inline="false"></span> <span>{{ __('Transactions') }}</span></a></li>

                <li><a href="{{ route('agent.logout') }}"><span class="iconify" data-icon="ant-design:logout-outlined" data-inline="false"></span> <span>{{ __('Logout') }} </span></a></li>
            </ul>
        </nav>
    </div>
</div>