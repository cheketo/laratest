<select id="{{ $name }}" name="{{ $name }}" class="form-control chosenSelect {{ array_get( $params, 'class' ) }}" {{ array_get( $params, 'extra' ) }} firstvalue="{{ array_get( $params, 'firstValue' ) }}" firsttext="{{ array_get( $params, 'firstText' ) }}" >

		@if( array_get( $params, 'placeholder' ) )

				<option value="" @if( !$value ) selected="selected" @endif >{{ array_get( $params, 'placeholder' ) }}</option>

		@endif

		@if( array_get( $params, 'firstText' ) || array_get( $params, 'firstValue' ) )

				<option value="{{ array_get( $params, 'firstValue' ) }}" >{{ array_get( $params, 'firstText' ) }}</option>

		@endif

		@if( is_array( $options ) )

		    @if( !empty( $options ) )

						@foreach( $options as $key => $option )

								@if( is_array( $option ) )

										<optgroup label="{{ $key }}">

												@foreach( $option as $gkey => $goption )

														<option value="{{ $gkey }}" @if( $key == $value ) selected="selected" @endif >{{ $goption }}</option>

												@endforeach

										</optgroup>

								@else

										<option value="{{ $key }}" @if( $key == $value ) selected="selected" @endif >{{ $option }}</option>

								@endif

						@endforeach

		    @endif

		@else

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

				@endphp



				@foreach( $options->keyBy( $fieldKey ) as $key => $option )

						@php  @endphp

						<option value="{{ $key }}" @if( $key == $value ) selected="selected" @endif >{{ $option[ $fieldValue ] }}</option>

				@endforeach

		@endif

</select>
