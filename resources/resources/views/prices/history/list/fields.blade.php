@section( 'search_fields' )

		<div class="input-group col-lg-5 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

				@if( app( 'request' )->input( 'view_order_field' ) == 'created_at_from' )

						@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="created_at" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

						@else

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="created_at" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

						@endif

				@else

						<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="created_at" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

				@endif

				<input id="created_at_from" name="created_at_from" value="{{ app( 'request' )->input( 'created_at_from' ) }}" class="form-control datePicker" placeholder="Fecha Desde" type="text">

		</div>

		<div class="input-group col-lg-5 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

				@if( app( 'request' )->input( 'view_order_field' ) == 'created_at_to' )

						@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="created_at" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

						@else

								<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="created_at" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

						@endif

				@else

						<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="created_at" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

				@endif

				<input id="created_at_to" name="created_at_to" value="{{ app( 'request' )->input( 'created_at_to' ) }}" class="form-control datePicker" placeholder="Fecha Hasta" type="text">

		</div>


@endsection
