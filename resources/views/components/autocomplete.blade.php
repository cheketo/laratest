<input type="text"
	id="TextAutoComplete{{ $name }}"
	name="TextAutoComplete{{ $name }}"

	targetauto="{{ array_get( $params, 'target' ) }}"
	value="{{ array_get( $value, 'text' ) }}"
	iconauto="{{ array_get( $params, 'icon' ) }}"
	cacheauto="{{ array_get( $params, 'cache' ) }}"
	placeholderauto="{{ array_get( $params, 'placeholder' ) }}"
	varsauto="{{ array_get( $params, 'vars' ) }}"

	class="form-control TextAutoComplete {{ array_get( $params, 'class' ) }}"

	{{ array_get( $params, 'extra' ) }} />

<input type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ array_get( $value, 'hidden' ) }}" />
