<li class="kt-menu__section ">
  <h4 class="kt-menu__section-text">Developer Options</h4>
  <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li id="project-details-mm" class="kt-menu__item" aria-haspopup="true">
  <a href="{{ route('project-details.index') }}" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-cog"></i><span class="kt-menu__link-text">Project Details</span></a>
</li>
<li class="{{ \Illuminate\Support\Arr::toCssClasses(['kt-menu__item', 'kt-menu__item--submenu kt-menu__item--open kt-menu__item--here' => request()->routeIs('menu.*')]) }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon la la-git"></i><span class="kt-menu__link-text">Menus</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
  <div class="kt-menu__submenu"><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
      <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
        <span class="kt-menu__link"><span class="kt-menu__link-text">Menus</span></span>
      </li>
      <li class="{{ \Illuminate\Support\Arr::toCssClasses(['kt-menu__item', 'kt-menu__item--active' => request()->routeIs('menu.index')]) }}" aria-haspopup="true">
        <a href="{{ route('menu.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Show Menus</span></a>
      </li>
      <li class="{{ \Illuminate\Support\Arr::toCssClasses(['kt-menu__item', 'kt-menu__item--active' => request()->routeIs('menu.create')]) }}" aria-haspopup="true">
        <a href="{{ route('menu.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create Menu</span></a>
      </li>
    </ul>
  </div>
</li>
<li id="menu-visibility-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="{{ route('menu-visibility.index') }}" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-cog"></i><span class="kt-menu__link-text">Menu Visibility</span></a>
</li>
<li id="menu-visibility-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="{{ route('log-viewer::dashboard') }}" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-fw fa-book"></i><span class="kt-menu__link-text">Log Viewer</span></a>
</li>
