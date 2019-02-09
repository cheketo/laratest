@extends( 'layouts.app' )

@extends( 'layouts.public.head' )

@section( 'body' )

		<body>

				@include( 'layouts.public.loader' )

				@yield( 'content' )

				@include( 'layouts.public.scripts' )

		</body>

@endsection
