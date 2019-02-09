@extends( 'layouts.private' )

@section( 'tab_title', 'Cuenta Corriente' )

@section( 'page_title', 'Cuenta Corriente' )

@section( 'page_subtitle', 'de ' . $student->guarani->nombres . ' ' . $student->guarani->apellido )

@section( 'scripts' )

	{{ HTML::script( '/views/students/js/main.js' ) }}

	{{ HTML::script( '/views/students/js/account.js' ) }}

@endsection

@section( 'content' )

		<div class="box box-primary">

				<div class="box-header">

						<h4><span class=""><i class="fa fa-calendar"></i> Deuda Total a Hoy:</span></h4>

				</div>

				<div class="box-body no-padding">

						@if( $totalBalance < 0 )

								<div class="callout callout-danger txC">

						 				<h2>$ {{ number_format($totalBalance * -1, 2, ',', '.') }}</h2>

								</div>

						@else

								<div class="callout callout-success txC">

										<h2>$ {{ number_format($totalBalance * -1, 2, ',', '.') }}</h2>

								</div>

						@endif

				</div>

				<div class="box-footer txC">

						@if( $request->get( 'msg' ) == 'enrole' )

								<button type="button" class="btn btn-blue BtnGoToList" tabindex="102"><i class="fa fa-arrow-left"></i> Volver al listado de Alumnos</button>

						@else

								<button type="button" class="btn btn-blue BtnCancel" tabindex="102"><i class="fa fa-arrow-left"></i> Volver al listado de Alumnos</button>

						@endif

				</div>

		</div>

		@foreach( $inscriptions as $inscription )

				<div class="box box-primary">

				    <div class="box-header">

				      	<h3 class="box-title">{{ $inscription->career->name }} ( <span class="text-red"> $ {{ number_format( $inscription->balance, 2, ',', '.') }} </span> ) </h3>

				    </div>

		        <div class="box-body no-padding">

								@if( count( $inscription->showMovements ) < 1 )

										<h4 class="txC text-blue">

												<i class="icon fa fa-check-circle"></i> Sin deuda

										</h4>

								@else

				        		<table class="table table-striped table-hover">

				            		<tbody>

														<tr>

				                  			<th style="width: 30px" class="txC">Fecha</th>

				                  			<th>Concepto</th>

				                  			<th class="txC">Monto</th>

				                  			<th class="txC">Balance</th>

				                		</tr>

														@php

																$balance = 0;

														@endphp

														@foreach( $inscription->showMovements as $movement )



																		@php

																				switch( $movement->type->type )
																				{

																						case 'D':

																								$movementClass = 'text-red';

																						break;

																						case 'C':

																								$movementClass = 'text-green';

																						break;

																				}

																				$balanceClass = $movement->balance >= 0? 'text-green' : 'text-red';

																		@endphp

								                		<tr>

								                  			<td class="txC">{{ date( 'd/m/Y', strtotime( $movement->creation_date ) ) }}</td>

								                  			<td ><strong>{{ $movement->concept }}</strong></td>

								                  			<td class="txC {{ $movementClass }} ">$ {{ number_format( $movement->amount, 2, ',', '.' ) }}</td>

								                  			<td class="txC {{ $balanceClass }} ">$ {{ number_format( $movement->balance, 2, ',', '.' ) }}</td>

								                		</tr>

														@endforeach

														@foreach( $inscription->showMovements as $movement )

																@foreach( $movement->children as $child )

																		@php

																				switch( $child->type->type )
																				{

																						case 'D':

																								$movementClass = 'text-red';

																						break;

																						case 'C':

																								$movementClass = 'text-green';

																						break;

																				}

																				$balanceClass = $child->balance >= 0? 'text-green' : 'text-red';

																		@endphp

								                		<tr>

								                  			<td class="txC">{{ date( 'd/m/Y', strtotime( $child->creation_date ) ) }}</td>

								                  			<td ><strong>{{ $child->concept }}</strong></td>

								                  			<td class="txC {{ $movementClass }} ">$ {{ number_format( $child->amount, 2, ',', '.' ) }}</td>

								                  			<td class="txC {{ $balanceClass }} ">$ {{ number_format( $child->balance, 2, ',', '.' ) }}</td>

								                		</tr>

																@endforeach

														@endforeach

												</tbody>

										</table>

								@endif

		        </div>

		    </div>

		@endforeach

@endsection
