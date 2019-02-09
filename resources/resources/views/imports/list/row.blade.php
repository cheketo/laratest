<!-- Col -->
<div class="form-group col-lg-3 col-md-4 col-sm-4 list-col-container">
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 list-select-btn-container">
				<button aria-label="Seleccionar" type="button" id="select_{{ $element->id }}" class="SelectRowButton btn btn-default animated fadeIn hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
		</div>
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-10">
				<div class="listRowInner">
						<img class="img-circle hideMobile" src="{{ $element->user->image->route }}" alt="{{ $element->user->first_name }} {{ $element->user->last_name }}">
						<!-- <span class="listTextStrong">@if( $element->parent_id > 0 ){{ $element->parent->title_menu }}@endif/{{ $element->title_menu }}</span> -->
						<span class="listTextStrong"><b><span class="badge bg-teal-active disabled">{{ $element->user->first_name }} {{ $element->user->last_name }}</span></b></span>
						<span class="smallTitle"><b>(ID: {{ $element->id }})</b></span>

				</div>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Fecha</span>
				<span class="listTextStrong">

						<span class="label label-brown">{{ $element->created_at->format( 'd/m/Y | H:i:s' ) }}</span>

				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Alumnos</span>
				<span class="listTextStrong">
						<span class="label label-info">{{ $element->students }}</span>
				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Inscripciones</span>
				<span class="listTextStrong">
						<span class="label label-primary">{{ $element->inscriptions }}</span>
				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Matrículas</span>
				<span class="listTextStrong">
						<span class="label bg-purple disabled">{{ $element->enrollments }}</span>
				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Cuotas</span>
				<span class="listTextStrong">
						<span class="label bg-yellow">{{ $element->fees }}</span>
				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Pagos</span>
				<span class="listTextStrong">
						<span class="label bg-navy">{{ $element->payments }}</span>
				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Movimientos</span>
				<span class="listTextStrong">
						<span class="label label-success">{{ $element->movements }}</span>
				</span>
		</div>
</div>
<!-- /Col -->
