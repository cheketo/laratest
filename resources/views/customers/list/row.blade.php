<!-- Col -->
<div class="form-group col-lg-3 col-md-4 col-sm-4 list-col-container">
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 list-select-btn-container">
				<button aria-label="Seleccionar" type="button" id="select_{{$element->id}}" class="SelectRowButton btn btn-default animated fadeIn hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
		</div>
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-10">
				<div class="listRowInner">
						<img class="img-circle hideMobile" src="/views/careers/images/default/default.png" alt="{{ $element->name }}">
						<!-- <span class="listTextStrong">@if( $element->parent_id > 0 ){{ $element->parent->title_menu }}@endif/{{ $element->title_menu }}</span> -->
						<span class="smallTitle"><b><span class="badge bg-teal-active disabled">{{ $element->company_id }}</span></b></span>
						<span class="listTextStrong">{{ $element->name }}</span>
				</div>
		</div>
</div>
<!-- /Col -->

<!-- Col -->
<!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Grupo</span>
				<span class="listTextStrong">
						@if( $element->group )

								<span class="label label-brown">{{ $element->group->name }}</span>

						@else

								<span class="label label-default">Sin Grupo Asignado</span>

						@endif

				</span>
		</div>
</div> -->
<!-- /Col -->

<!-- Col -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<div class="listRowInner">
				<span class="smallTitle">Estado</span>
				<span class="listTextStrong">
						@if( $element->status == 'A' )

								<span class="label label-success">Activo</span>

						@else

								<span class="label label-danger">Inactivo</span>

						@endif

				</span>
		</div>
</div>
<!-- /Col -->
