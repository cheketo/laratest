<!-- Col -->
<div class="form-group col-lg-3 col-md-4 col-sm-4 list-col-container">
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 list-select-btn-container">
				<button aria-label="Seleccionar" type="button" id="select_{{$element->id}}" class="SelectRowButton btn btn-default animated fadeIn hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
		</div>
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-10">
				<div class="listRowInner">
						<img class="img-circle hideMobile" src="{{ $element->user->image->route }}" alt="{{ $element->group->name }}-{{ $element->category->name }}">
						<span class="listTextStrong">Autor</span>
						<span class="listTextStrong"><b><span class="badge bg-blue-active disabled">{{ $element->user->first_name }} {{ $element->user->last_name }}</span></b></span>

				</div>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="listTextStrong">Categoría</span>
				<span class="smallTitle">

						<span class="listTextStrong"><b><span class="badge bg-blue-active disabled">{{ $element->group->name }}</span><span class="badge bg-teal-active disabled">{{ $element->category->name }}</span></b></span>

				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="listTextStrong">Matrículas</span>
				<span class="smallTitle">

						{!! $element->enrollment_amount > 0 ? '<span class="text-primary"><b>' . $element->enrollment_amount . '</b></span> de <span class="text-success"><b>$' . $element->enrollment_price . '</b></span>' : '<span class="label label-default">Sin Matrícula</span>' !!}

				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="listTextStrong">Cuotas</span>
				<span class="smallTitle">

						{!! $element->fee_amount > 0 ? '<span class="text-primary"><b>' . $element->fee_amount . '</b></span> de <span class="text-success"><b>$' . $element->fee_price . '</b></span>' : '<span class="label label-default">Sin Cuotas</span>' !!}

				</span>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="listTextStrong">Fecha</span>
				<span class="smallTitle">

						<span class="badge bg-blue">{{ $element->created_at->format( 'd/m/Y | H:i:s' ) }}</span>

				</span>
		</div>
</div>
<!-- /Col -->
