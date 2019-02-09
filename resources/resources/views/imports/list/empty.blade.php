<div class="callout callout-info">

		<h4>

				<i class="icon fa fa-info-circle"></i> No se encontraron importaciones.

		</h4>

		@if( auth()->user()->hasRoute( 'import_create' ) )

				<p>Puede realizar una nueva importación haciendo <a href="{{ route( 'import_create' ) }}">click aqui</a>.</p>

		@endif

</div>
