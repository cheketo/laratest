@extends( 'layouts.private' )

@section( 'tab_title', 'Inicio' )

@section( 'page_title', 'Inicio' )

@section( 'content' )

		<div class="col-md-4 col-md-offset-4">

  			<div class="panel panel-default">

    				<div class="panel-heading">

        				<h1 class="panel-title">Bienvenido {{ auth()->user()->name }}</h1>

    				</div>

    				<div class="panel-body">

								@if( auth()->user()->user )

										<strong>Usuario: </strong> {{ auth()->user()->user }}

								@else

      							<strong>Email: </strong> {{ auth()->user()->email }}

								@endif

    				</div>

    				<div class="panel-footer">

      					<form method="POST" action="{{ route( 'logout' ) }}">

        						{{ csrf_field() }}

        						<button type="submit" class="btn btn-danger btn-xs btn-block" name="button">Cerrar Sesión</button>

      					</form>

    				</div>

  			</div>

		</div>
		
@endsection
