@section( 'action_buttons' )

		<!-- Select All -->
		<button aria-label="Seleccionar todos" type="button" id="SelectAll" class="btn animated fadeIn NewElementButton hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
		<!-- Deselect All -->
		<button type="button" aria-label="Deseleccionar todos" id="UnselectAll" class="btn animated fadeIn NewElementButton Hidden hint--bottom-right hint--bounce"><i class="fa fa-square"></i></button>
		<!-- Delete Selected -->
		<button type="button" aria-label="Eliminar Seleccionados" msgok="¡Las tarifas han sido eliminadas con éxito!" msgerror="Hubo un error al intentar eliminar las tarifas." msgquestion="¿Desea eliminar las tarifas seleccionadas?" class="btn bg-red animated fadeIn NewElementButton Hidden DeleteSelectedElements hint--bottom hint--bounce hint--error"><i class="fa fa-trash-o"></i></button>
		<!-- Activate Selected -->
		<button type="button" aria-label="Activar Seleccionados" msgok="Las tarifas han sido activadas con éxito!" msgerror="Hubo un error al intentar activar las tarifas." msgquestion="¿Desea activar las tarifas seleccionadas?" class="btn btn-green animated fadeIn NewElementButton Hidden ActivateSelectedElements hint--bottom hint--bounce hint--success"><i class="fa fa-check-circle"></i></button>
		<!-- Expand Selected -->
		<button type="button" aria-label="Expandir Seleccionados" class="btn bg-navy animated fadeIn NewElementButton Hidden ExpandSelectedElements hint--bottom hint--bounce hint--primary"><i class="fa fa-plus"></i></button>
		<!-- Contract Selected -->
		<button type="button" aria-label="Contraer Seleccionados" class="btn bg-navy animated fadeIn NewElementButton Hidden ContractSelectedElements hint--bottom hint--bounce hint--primary"><i class="fa fa-minus"></i></button>

@endsection
