@extends( 'layouts.app' )

@extends( 'layouts.private.head' )

@section( 'body' )

		<body class="hold-transition skin-blue sidebar-mini fixed">

				@include( 'layouts.private.loader' )

				<div class="wrapper">

						@include( 'layouts.private.header' )

						@include( 'layouts.private.menu' )

						<div class="content-wrapper">

								<!-- Content Header (Page header) -->
								@include( 'layouts.private.breadcrumbs' )

								<!-- Main content -->
						    <section class="content">

										@yield( 'content' )

								</section>

						</div>

						@include( 'layouts.private.sidebar' )

						@include( 'layouts.private.footer' )

				</div>

				@include( 'layouts.private.scripts' )

		</body>

@endsection
