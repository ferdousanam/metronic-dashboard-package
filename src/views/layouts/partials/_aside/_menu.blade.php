<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
         data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            @foreach($mainMenus as $mainMenu)
                @if(!$mainMenu->child->count() > 0)
                    <li class="{{ \Illuminate\Support\Arr::toCssClasses(['kt-menu__item', 'kt-menu__item--active' => request()->routeIs($mainMenu->selector)]) }}"
                        aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="{{ \Illuminate\Support\Facades\Route::has($mainMenu->route_name) ? route($mainMenu->route_name) : url($mainMenu->route_url) }}" class="kt-menu__link ">
                            @if($mainMenu->icon)
                                <i class="kt-menu__link-icon {{ $mainMenu->icon }}"></i>
                            @else
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            @endif
                            <span class="kt-menu__link-text">{{ $mainMenu->menu_name }}</span>
                        </a>
                    </li>
                @else
                    <li class="{{ \Illuminate\Support\Arr::toCssClasses(['kt-menu__item', 'kt-menu__item--submenu kt-menu__item--open kt-menu__item--here' => request()->routeIs($mainMenu->selector . '*')]) }}"
                        aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            @if($mainMenu->icon)
                                <i class="kt-menu__link-icon {{ $mainMenu->icon }}"></i>
                            @else
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            @endif
                            <span class="kt-menu__link-text">{{ $mainMenu->menu_name }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                    <span class="kt-menu__link">
                                        <span class="kt-menu__link-text">{{ $mainMenu->menu_name }}</span>
                                    </span>
                                </li>
                                @foreach($mainMenu->child  as $subMenu)
                                    <li class="{{ \Illuminate\Support\Arr::toCssClasses(['kt-menu__item', 'kt-menu__item--active' => request()->routeIs($subMenu->selector)]) }}"
                                        aria-haspopup="true">
                                        <a href="{{ \Illuminate\Support\Facades\Route::has($subMenu->route_name) ? route($subMenu->route_name) : url($subMenu->route_url) }}"
                                           class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ $subMenu->menu_name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
            @stack('custom-menus')
            @if(super_user())
                @include('dashboard::layouts.inc.superUserMenus')
            @endif
            @if(super_user() && developer_mode())
                @include('dashboard::layouts.inc.devMenus')
            @endif
        </ul>
    </div>
</div>
<!-- end:: Aside Menu -->
