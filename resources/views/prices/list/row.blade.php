<!-- Col -->
<div class="form-group col-lg-3 col-md-4 col-sm-4 list-col-container">
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 list-select-btn-container">
				<button aria-label="Seleccionar" type="button" id="select_{{ $element->group_id }}-{{ $element->category_id }}" class="SelectRowButton btn btn-default animated fadeIn hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
		</div>
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-10">
				<div class="listRowInner">
						<img class="img-circle hideMobile" src="/views/prices/images/default/default.png" alt="{{ $element->group->name }}-{{ $element->category->name }}">
						<!-- <span class="listTextStrong">@if( $element->parent_id > 0 ){{ $element->parent->title_menu }}@endif/{{ $element->title_menu }}</span> -->
						<span class="listTextStrong"><b><span class="badge bg-blue-active disabled">{{ $element->group->name }}</span></b></span>
						<span class="listTextStrong"><b><span class="badge bg-teal-active disabled">{{ $element->category->name }}</span></b></span>
				</div>
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
