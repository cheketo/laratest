<!-- Career prices -->
<h4 class="subTitleB"><i class="fa fa-dolar"></i> Aranceles de {{ $career->name }} {{ Form::hint( 'Muestra los aranceles de las matrículas y las cuotas que deberá abonar el alumno.' ) }}</h4>


@if( $price->enrollment_amount > 0 )

		<div class="row bg-gray-light">

				<div class="col-xs-2 txC">{{ $price->enrollment_amount }}</div>
				<div class="col-xs-4 txC">@if( $price->enrollment_amount > 1 ) Matrículas @else Matrícula @endif</div>
				<div class="col-xs-2 txC">de</div>
				<div class="col-xs-4 txC">$ {{ number_format( $price->enrollment_price , 2 , ',' , '.' ) }}</div>

		</div>

@else

		<div class="row bg-gray-light">

				<div class="col-xs-3 txC"></div>
				<div class="col-xs-6 txC">No abona Matrícula</div>
				<div class="col-xs-3 txC"></div>

		</div>

@endif

@if( $price->fee_amount > 0 )

		<div class="row bg-gray">

				<div class="col-xs-2 txC">{{ $price->fee_amount }}</div>
				<div class="col-xs-4 txC">@if( $price->fee_amount > 1 ) Cuotas @else Cuota @endif</div>
				<div class="col-xs-2 txC">de</div>
				<div class="col-xs-4 txC">$ {{ number_format( $price->fee_price , 2 , ',' , '.' ) }} c/u</div>

		</div>

@else

		<div class="row bg-gray">

				<div class="col-xs-3 txC"></div>
				<div class="col-xs-6 txC">No abona Cuotas</div>
				<div class="col-xs-3 txC"></div>

		</div>

@endif

<div class="row bg-teal disabled">

		<div class="col-xs-2 txC"></div>
		<div class="col-xs-3 txC"></div>
		<div class="col-xs-3 txR"><strong>Total a Pagar</strong></div>
		<div class="col-xs-4 txC"><strong>$ {{ number_format( ( $price->fee_amount * $price->fee_price ) + ( $price->enrollment_amount * $price->enrollment_price ) , 2 , ',' , '.' ) }}</strong></div>

</div>
