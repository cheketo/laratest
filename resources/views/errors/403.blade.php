@extends( Auth::user() ? 'layouts.private' : 'layouts.public' );

@section( 'tab_title', 'Permiso Denegado' )

@section( 'content' )

		<div class="error-page">

				<h1 class="headline text-red"> 403</h1>

				<div class="error-content">

						<h3><i class="fa fa-times-circle text-red"></i> Opa! No tenes permiso.</h3>

						<p>

								No podes ver el contenido de esta página ya que te faltan los permisos necesarios.
								Mientras tanto, quizás quieras <a href="{{ URL::previous() }}">volver a la página anterior</a> o <a href="{{ route( 'dashboard' ) }}">volver al incio</a>.

						</p>

				</div>

		</div>

@endsection
