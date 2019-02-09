<div class="callout callout-info">

		<h4>

				<i class="icon fa fa-info-circle"></i> No se encontraron tarifas.

		</h4>

		@if( auth()->user()->hasRoute( 'price_create' ) )

				<p>Puede crear una tarifa haciendo <a href="{{ route( 'price_create' ) }}">click aqui</a>.</p>

		@endif

</div>
