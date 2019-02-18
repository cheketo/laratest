@php

		if( array_get( $params, 'fieldkey' ) )
		{

				$fieldKey = array_get( $params, 'fieldkey' );

		}else{

				$fieldKey = 'id';

		}

		if( array_get( $params, 'fieldvalue' ) )
		{

				$fieldValue = array_get( $params, 'fieldvalue' );

		}else{

				$fieldValue = $fieldKey;

		}

		if( $values && !is_array( $values ) )
		{

				if( is_object( $values ) )
				{

						$values = $values->toArray();

						$selected = array();

						foreach( $values as $item )
						{

								$selected[] = $item[ $fieldKey ];

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

				<option value="" ></option>

		@endif

		@if( is_array( $options ) )

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

		@else

				@foreach( $options->keyBy( $fieldKey ) as $key => $option )

						<option value="{{ $key }}" @if( in_array( $key, $values ) ) selected="selected" @endif >{{ $option[ $fieldValue ] }}</option>

				@endforeach

		@endif

</select>
