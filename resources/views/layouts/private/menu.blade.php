
@if( auth()->user() )

		<!-- main-sidebar -->
		<aside class="main-sidebar">

				<!-- sidebar -->
				<section class="sidebar">

						<!-- sidebar-menu -->
						<ul class="sidebar-menu" data-widget="tree">

								@foreach( App\Http\Controllers\MenuController::getParentMenus() as $menu )

										@if( $menu[ 'route_id' ] )

												@include( 'layouts.private.menu.link', [ 'menu' => $menu ] )

										@else

												@if( App\Http\Controllers\UserController::hasMenuChildren( $menu ) )

														@php

																if( session( 'active_route' )->menus->count() > 0 )

																		$activeClass = ( App\Http\Controllers\MenuController::isAncestor( $menu, session( 'active_route' )->menus[ 0 ] ) )? 'active menu-open' : '';

																else

																		$activeClass = '';

														@endphp

														<li class="{{ $activeClass }} treeview">

																<a href="#">

																		<i class="{{ $menu[ 'icon' ] }}"></i> <span>{{ $menu[ 'title_menu' ] }}</span>

																		<span class="pull-right-container">

																				<i class="fa fa-angle-left pull-right"></i>

																		</span>

																</a>

																<ul class="{{ $activeClass }} treeview-menu">

																		@include( 'layouts.private.menu.children', [ 'menus' => $menu->children ] )

																</ul>

														</li>

												@endif

										@endif

								@endforeach

						</ul>
						<!-- /sidebar-menu -->

				</section>
				<!-- /sidebar -->

		</aside>
		<!-- /main-sidebar -->

@endif
