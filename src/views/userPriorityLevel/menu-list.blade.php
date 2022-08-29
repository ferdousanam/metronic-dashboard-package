@if($menus->count() > 0)
    <ul>
        @foreach($menus as $key => $menu)
            @if(!$menu->menu_id || $menu->child->count() > 0)
                <li class="col-sm-12">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}" id="menu-id-{{ $menu->id }}"
                               parent-id="{{ $menu->menu_id }}" {{ $menu->priorities_count > 0 ? 'checked': null }}>
                        {{ $menu->menu_name }}<span></span>
                    </label>
                    @if($menu->child->count() > 0)
                        {!! generate_priority_menus($priority_id, $menu->id) !!}
                    @endif
                </li>
            @else
                <li class="col-sm-4">
                    <label class="kt-checkbox kt-checkbox--success">
                        <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}" id="menu-id-{{ $menu->id }}"
                               parent-id="{{ $menu->menu_id }}" {{ $menu->priorities_count > 0 ? 'checked': null }}>
                        {{ $menu->menu_name }}<span></span>
                    </label>
                </li>
            @endif
        @endforeach
    </ul>
@endif
