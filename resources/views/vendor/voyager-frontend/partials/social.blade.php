@foreach($items as $menu_item)
    <li>
        <a href="{{ $menu_item->link() }}">
            <span class="{{ $menu_item->icon_class }}"></span>
        </a>
    </li>
@endforeach