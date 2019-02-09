

	<!-- Expand Button -->
	<a class="hint--bottom hint--bounce" aria-label="Mostrar más información">
			<button type="button" class="btn bg-navy ExpandButton" id="expand_{{ $element->id }}"><i class="fa fa-plus"></i></button>
	</a>

	@if( auth()->user()->hasRoute( 'career_group_show' ) )

			<!-- Show Button -->
			<a class="hint--bottom hint--bounce" aria-label="Ver Detalle" href="/carreras/grupos/{{ $element->id }}" id="view_{{ $element->id }}">
					<button type="button" class="btn btn-github"><i class="fa fa-eye"></i></button>
			</a>

	@endif

	@if( auth()->user()->hasRoute( 'career_group_edit' ) )

			<!-- Edit Button -->
			<a href="/carreras/grupos/editar/{{ $element->id }}" class="hint--bottom hint--bounce hint--info" aria-label="Editar">
					<button type="button" class="btn btn-blue"><i class="fa fa-pencil"></i></button>
			</a>

	@endif



	@if( $element->status == 'A' && auth()->user()->hasRoute( 'career_group_delete' ) )

			<!-- Delete Button -->
			<a class="deleteElement hint--bottom hint--bounce hint--error" aria-label="Eliminar" url="/carreras/grupos/eliminar/{{ $element->id }}" msgok="El grupo <b>{{ $element->name }}</b> ha sido eliminado correctamente." msgerror="Hubo un error al intentar eliminar el grupo <b>{{ $element->name }}</b>." msgquestion="¿Desea eliminar el grupo <b>{{ $element->name }}</b>?" id="delete_{{ $element->id }}">
					<button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button>
			</a>

	@endif


	@if( $element->status == 'I' && auth()->user()->hasRoute( 'career_group_activate' ) )

			<!-- Activate Button -->
			<a class="activateElement hint--bottom hint--bounce hint--success" aria-label="Activar" url="/carreras/grupos/activar/{{ $element->id }}" msgok="El group <b>{{ $element->name }}</b> ha sido activado." msgerror="Hubo un error al intentar activar el grupo <b>{{ $element->name }}</b>." msgquestion="¿Desea activar el grupo <b>{{ $element->name }}</b>?" id="activate_{{ $element->id }}">
					<button type="button" class="btn btn-green"><i class="fa fa-check-circle"></i></button>
			</a>

	@endif
