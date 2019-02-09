

	<!-- Expand Button -->
	<!-- <a class="hint--bottom hint--bounce" aria-label="Mostrar más información">
			<button type="button" class="btn bg-navy ExpandButton" id="expand_{{$element->id}}"><i class="fa fa-plus"></i></button>
	</a> -->

	<!-- Show Button -->
	<!-- <a class="hint--bottom hint--bounce" aria-label="Ver Detalle" href="/alumnos/categorias/{{$element->id}}" id="view_{{$element->id}}">
			<button type="button" class="btn btn-github"><i class="fa fa-eye"></i></button>
	</a> -->


	<!-- Edit Button -->
	<!-- <a href="/alumnos/categorias/editar/{{ $element->id }}" class="hint--bottom hint--bounce hint--info" aria-label="Editar">
			<button type="button" class="btn btn-blue"><i class="fa fa-pencil"></i></button>
	</a> -->



	@if( $element->status == 'A' )

			<!-- Delete Button -->
			<!-- <a class="deleteElement hint--bottom hint--bounce hint--error" aria-label="Eliminar" url="/alumnos/categorias/eliminar/{{ $element->id }}" msgok="El carrera <b>{{$element->name}}</b> ha sido eliminada correctamente." msgerror="Hubo un error al intentar eliminar la carrera <b>{{$element->name}}</b>." msgquestion="¿Desea eliminar la carrera <b>{{$element->name}}</b>?" id="delete_{{$element->carrera}}">
					<button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button>
			</a> -->

	@endif


	@if( $element->status == 'I' )

			<!-- Activate Button -->
			<!-- <a class="activateElement hint--bottom hint--bounce hint--success" aria-label="Activar" url="/alumnos/categorias/activar/{{ $element->id }}" msgok="El carrera <b>{{ $element->name }}</b> ha sido activada." msgerror="Hubo un error al intentar activar la carrera <b>{{ $element->name }}</b>." msgquestion="¿Desea activar la carrera <b>{{ $element->name }}</b>?" id="activate_{{ $element->carrera }}">
					<button type="button" class="btn btn-green"><i class="fa fa-check-circle"></i></button>
			</a> -->

	@endif
