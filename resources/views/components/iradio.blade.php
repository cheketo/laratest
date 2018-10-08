<input

		type="radio"

		id="{{ $name }}"

		name="{{ $name }}"

		value="{{ $value }}"

		shape="{{ array_get( $params, 'shape' ) }}"

		color="{{ $color }}"

		class="iCheckbox {{ array_get( $params, 'class' ) }}"

		style=" {{ array_get( $params, 'style' ) }}"

		@if( $checked )

				checked="checked"

		@endif

		{{ array_get( $params, 'extra' ) }}

>
