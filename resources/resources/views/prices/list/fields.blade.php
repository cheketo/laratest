@section( 'search_fields' )

		<div class="input-group col-lg-3 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

				@if( app( 'request' )->input( 'view_order_field' ) == 'name' )

						@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="name" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

						@else

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="name" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

						@endif

				@else

						<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="name" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

				@endif

				<input id="name" name="name" value="{{ app( 'request' )->input( 'name' ) }}" class="form-control" placeholder="Nombre" type="text">

		</div>

		<div class="input-group col-lg-3 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

				@if( app( 'request' )->input( 'view_order_field' ) == 'description' )

						@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="description" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

						@else

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="description" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

						@endif

				@else

						<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="description" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

				@endif

				<input id="description" name="description" value="{{ app( 'request' )->input( 'description' ) }}" class="form-control" placeholder="Descripcion" type="text">

		</div>

@endsection
