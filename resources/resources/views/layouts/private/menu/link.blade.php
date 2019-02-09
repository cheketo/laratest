@if( App\Http\Controllers\UserController::hasMenu( $menu ) && $menu->route->status == 'A' )

		<li @if( session( 'active_route' ) && $menu->route->route == session( 'active_route' )->route ) class="active" @endif>

				<a href="{{ route($menu->route->name) }}"><i class="{{ $menu[ 'icon' ] }}"></i> {{ $menu[ 'title_menu' ] }}</a>

		</li>

@endif
