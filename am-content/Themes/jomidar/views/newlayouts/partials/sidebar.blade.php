<div class="col-lg-2 side-bar">
    <ul class="list-unstyled sideBar-links d-flex d-lg-block justify-content-around">
        <li>
            <a href="{{ route('agent.profile.settings') }}" class="text-decoration-none py-3 justify-content-end d-flex align-items-center theme-bg-sky theme-text-white font-16 font-bold">
                <span>{{__('labels.dashboard')}}</span>
                <img src="{{asset('assets/images/board.png')}}" alt="" class="img-fluid">
            </a>
        </li>
        <li>
            <a href="/favorite"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center theme-grey-light theme-text-blue font-16">
                <span>{{__('labels.favorite')}}</span>
                <img src="{{asset('assets/images/fav-dash.png')}}" alt="" class="img-fluid">
            </a>
        </li>
        <li>
            <a href="{{ route('agent.property.property_list') }}"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center theme-grey-light theme-text-blue font-16">
                <span>{{__('labels.my_properties')}}</span>
                <img src="{{asset('assets/images/side-home.png')}}" alt="" class="img-fluid">
            </a>
        </li>
        <li>
            <a href="/account"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center theme-grey-light theme-text-blue font-16">
                <span>{{__('labels.account_setting')}}</span>
                <img src="{{asset('assets/images/setting-icon.png')}}" alt="" class="img-fluid">
            </a>
        </li>
        <li>
            <a href="{{ route('agent.logout') }}"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center theme-grey-light theme-text-blue font-16">
                <span>{{__('labels.log_out')}}</span>
                <img src="{{asset('assets/images/logout.png')}}" alt="" class="img-fluid">
            </a>
        </li>
    </ul>
</div>
