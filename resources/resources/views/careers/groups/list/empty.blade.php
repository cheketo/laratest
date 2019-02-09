<div class="callout callout-info">

		<h4>

				<i class="icon fa fa-info-circle"></i> No se encontraron grupos.

		</h4>

		@if( auth()->user()->hasRoute( 'career_group_create' ) )

				<p>Puede crear un grupo haciendo <a href="{{ route( 'career_group_create' ) }}">click aqui</a>.</p>

		@endif

</div>
