<div class="col-lg-2 side-bar">
    <ul class="list-unstyled sideBar-links d-flex d-lg-block justify-content-around" id="sidebar_url">
        <li>
            <a href="{{ route('agent.profile.settings') }}" class="text-decoration-none py-3 justify-content-end sidebar-active d-flex align-items-center font-16 font-bold">
                <span>{{__('labels.dashboard')}}</span>
                <i class="fa-solid fa-gauge"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('agent.property.userboard_favorite') }}" id="favorite"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center font-16 ">
                <span>{{__('labels.favorite')}}</span>
                <i class="fa-brands fa-gratipay"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('agent.property.property_list') }}" id="property_list"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center font-16 ">
                <span>{{__('labels.my_properties')}}</span>
                <i class="fa-solid fa-table-list"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('agent.profile.account') }}" id="setting"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center font-16 ">
                <span>{{__('labels.account_setting')}}</span>
                <i class="fa-solid fa-gear"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('agent.logout') }}"
               class="text-decoration-none py-3 justify-content-end d-flex align-items-center font-16 ">
                <span>{{__('labels.log_out')}}</span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </li>
    </ul>
</div>

