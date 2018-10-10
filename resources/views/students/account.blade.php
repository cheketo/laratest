@extends( 'layouts.private' )

@section( 'tab_title', 'Cuenta Corriente' )

@section( 'page_title', 'Cuenta Corriente' )

@section( 'page_subtitle', 'de ' . $student->nombres . ' ' . $student->apellido )

@section( 'scripts' )

	{{ HTML::script( '/views/students/js/students.js' ) }}
	
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

						<button type="button" class="btn btn-blue BtnCancel" tabindex="102"><i class="fa fa-arrow-left"></i> Volver al listado de Alumnos</button>

				</div>

		</div>

		@foreach( $careers as $career )

				<div class="box box-primary">

				    <div class="box-header">

				      	<h3 class="box-title">{{ $career[ 'career' ]->nombre }} ( <span class="text-red"> $ {{ number_format($career[ 'balance' ], 2, ',', '.') }} </span> ) </h3>

				    </div>

		        <div class="box-body no-padding">

								@if( count( $career[ 'movements' ] ) < 1 )

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

														@foreach( $career[ 'movements' ] as $movement )

																@if( $movement->escobro == 0 || $movement->movimiento == 'T')

																		@php

																				switch( $movement->movimiento )
																				{

																						case 'M':

																								$concept = 'Matricula';

																								$movementClass = 'text-red';

																						break;

																						case 'C':

																								$concept = 'Cuota N°' . $movement->cuota;

																								$movementClass = 'text-red';

																						break;

																						case 'T':

																								$concept = 'Pago';

																								$movementClass = 'text-green';

																						break;

																						default:

																								$concept = $movement->movimiento;

																						break;

																				}

																				$balanceClass = $movement->balance >= 0? 'text-green' : 'text-red';

																		@endphp

								                		<tr>

								                  			<td class="txC">{{ date( 'd/m/Y', strtotime( $movement->fecha ) ) }}</td>

								                  			<td ><strong>{{ $concept }}</strong></td>

								                  			<td class="txC {{ $movementClass }} ">$ {{ number_format($movement->importe, 2, ',', '.') }}</td>

								                  			<td class="txC {{ $balanceClass }} ">$ {{ number_format($movement->balance, 2, ',', '.') }}</td>

								                		</tr>

																@endif

														@endforeach

												</tbody>

										</table>

								@endif

		        </div>

		    </div>

		@endforeach

@endsection
