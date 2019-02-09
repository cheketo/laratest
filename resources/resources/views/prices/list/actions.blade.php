

	<!-- Expand Button -->
	<a class="hint--bottom hint--bounce" aria-label="Mostrar más información">
			<button type="button" class="btn bg-navy ExpandButton" id="expand_{{ $element->group_id }}-{{ $element->category_id }}"><i class="fa fa-plus"></i></button>
	</a>

	@if( auth()->user()->hasRoute( 'price_show' ) )

			<!-- Show Button -->
			<a class="hint--bottom hint--bounce" aria-label="Ver Detalle" href="/precios/detalle/{{ $element->group_id }}/{{ $element->category_id }}" id="view_{{ $element->group_id }}-{{ $element->category_id }}">
					<button type="button" class="btn btn-github"><i class="fa fa-eye"></i></button>
			</a>

	@endif

	@if( auth()->user()->hasRoute( 'price_history' ) )

			<!-- Show Button -->
			<a class="hint--bottom hint--bounce" aria-label="Ver Historial de Precios" href="/precios/historial?group={{ $element->group_id }}&category={{ $element->category_id }}" id="history_{{ $element->group_id }}-{{ $element->category_id }}">
					<button type="button" class="btn btn-github"><i class="fa fa-history"></i></button>
			</a>

	@endif

	@if( auth()->user()->hasRoute( 'price_edit' ) )

			<!-- Edit Button -->
			<a href="/precios/editar/{{ $element->group_id }}/{{ $element->category_id }}" class="hint--bottom hint--bounce hint--info" aria-label="Editar">
					<button type="button" class="btn btn-blue"><i class="fa fa-pencil"></i></button>
			</a>

	@endif



	@if( $element->status == 'A' && auth()->user()->hasRoute( 'price_delete' ) )

			<!-- Delete Button -->
			<a class="deleteElement hint--bottom hint--bounce hint--error" aria-label="Eliminar" url="/precios/eliminar/{{ $element->group_id }}/{{ $element->category_id }}" msgok="La precio <b>{{ $element->category->name }} {{ $element->group->name }}</b> ha sido eliminada correctamente." msgerror="Hubo un error al intentar eliminar la precio <b>{{ $element->category->name }} {{ $element->group->name }}</b>." msgquestion="¿Desea eliminar la precio <b>{{ $element->category->name }} {{ $element->group->name }}</b>?" id="delete_{{ $element->group_id }}-{{ $element->category_id }}">
					<button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button>
			</a>

	@endif


	@if( $element->status == 'I' && auth()->user()->hasRoute( 'price_activate' ) )

			<!-- Activate Button -->
			<a class="activateElement hint--bottom hint--bounce hint--success" aria-label="Activar" url="/precios/activar/{{ $element->group_id }}/{{ $element->category_id }}" msgok="La precio <b>{{ $element->category->name }} {{ $element->group->name }}</b> ha sido activada." msgerror="Hubo un error al intentar activar el grupo <b>{{ $element->category->name }} {{ $element->group->name }}</b>." msgquestion="¿Desea activar la precio <b>{{ $element->category->name }} {{ $element->group->name }}</b>?" id="activate_{{ $element->group_id }}-{{ $element->category_id }}">
					<button type="button" class="btn btn-green"><i class="fa fa-check-circle"></i></button>
			</a>

	@endif
