
@if( auth()->user() )

		<section class="content-header">

				<h1>

						@yield( 'page_title' )

						<small>@yield( 'page_subtitle' )</small>

				</h1>

				<ol class="breadcrumb">

						@if( session( 'active_route' )->menus->count() > 0 )

								@php

										$active_menu = session( 'active_route' )->menus[ 0 ];

								@endphp

								@if( $active_menu )

										@if( $active_menu->parent )

												@if( $active_menu->parent->parent )

														@if( $active_menu->parent->parent->parent )

																<li><i class="{{ $active_menu->parent->parent->parent->icon }}"></i> {{ $active_menu->parent->parent->parent->title_menu }}</li>

														@endif

												@endif

										@endif

								@endif

								@if( $active_menu )

										@if( $active_menu->parent )

												@if( $active_menu->parent->parent )

														<li><i class="{{ $active_menu->parent->parent->icon }}"></i> {{ $active_menu->parent->parent->title_menu }}</li>

												@endif

										@endif

								@endif

								@if( $active_menu )

										@if( $active_menu->parent )

												<li><i class="{{ $active_menu->parent->icon }}"></i> {{ $active_menu->parent->title_menu }}</li>

										@endif

								@endif

								@if( $active_menu )

										<li class="active"><i class="{{ session('active_route')->menus[ 0 ]->icon }}"></i> {{ session('active_route')->menus[ 0 ]->title_menu }}</li>

								@endif

						@endif

				</ol>

		</section>

@endif
