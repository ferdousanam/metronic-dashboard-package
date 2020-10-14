<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
  <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
    <ul class="kt-menu__nav ">
      {!! indent(generate_multilevel_menus()) !!}
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
