@extends( Auth::user() ? 'layouts.private' : 'layouts.public' )


@section( 'tab_title', 'Página no encontrada' )

@section( 'content' )

		<div class="error-page">

				<h1 class="headline text-orange"> 404</h1>

				<div class="error-content">

						<h3><i class="fa fa-warning text-orange"></i> La página que querés visitar no se encuentra.</h3>

						<p>

								No podes ver el contenido de esta página ya que no existe.
								Mientras tanto, quizás quieras <a href="{{ URL::previous() }}">volver a la página anterior</a> o <a href="{{ route( 'dashboard' ) }}">volver al incio</a>.
								Si crees que existe un error, no dudes en contactar al administrador del sistema.

						</p>

				</div>

		</div>

@endsection
