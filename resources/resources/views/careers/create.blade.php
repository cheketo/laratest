@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title', session( 'active_route' )->menus[ 0 ]->title_menu )

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'scripts' )

	{{ HTML::script( '/views/users/js/users.js' ) }}

	{{ HTML::script( '/views/users/js/create.js' ) }}

@endsection

@section( 'content' )

		

@endsection
