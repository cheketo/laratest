@php


		if( $values && !is_array( $values ) )
		{

				if( is_object( $values ) )
				{

						$values = $values->toArray();

						$selected = array();

						foreach( $values as $item )
						{

								$selected[] = $item[ 'id' ];

						}

						$values = $selected;

				}else{

						$values = explode( ',', $values );

				}

		}elseif( !$values ){

				$values = array();

		}

@endphp


<select id="{{ $name }}" multiple="multiple" name="{{ $name }}" class="form-control chosenSelect {{ array_get( $params, 'class' ) }}" {!! array_get( $params, 'extra' ) !!} data-placeholder="{{ array_get( $params, 'placeholder' ) }}">

		@if( array_get( $params, 'placeholder' ) )

				<option value="&nbsp;" ></option>

		@endif


		@if( !empty( $options ) )

				@foreach( $options as $key => $option )

						@if( is_array( $option ) )

								<optgroup label="{{$key}}">

										@foreach( $option as $gkey => $goption )

												<option value="{{ $gkey }}" @if( in_array( $gkey, $values ) ) selected="selected" @endif >{{ $goption }}</option>

										@endforeach

								</optgroup>

						@else

								<option value="{{ $key }}" @if( in_array( $key, $values ) ) selected="selected" @endif >{{ $option }}</option>

						@endif

				@endforeach

    @endif

</select>
