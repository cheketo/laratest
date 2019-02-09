@extends( 'layouts.private' )

@section( 'tab_title', 'Listado de Personas' )

@section( 'page_title', 'Listado' )

@section( 'page_subtitle', 'Personas' )

@section( 'styles' )

	{{ HTML::style( '/css/list.css' ) }}

@endsection

@section( 'scripts' )

	{{ HTML::script( 'js/list.js' ) }}

@endsection

@section( 'content' )

		<div class="box box-primary">

				<!-- Box Header -->
				<div class="box-header with-border">

						<!-- Search Filters -->
						<div class="SearchFilters searchFiltersHorizontal animated fadeIn Hidden" style="margin-bottom:10px;">

								<!-- SearchFieldsForm -->
								<div class="form-inline" id="SearchFieldsForm">

										<!-- <input id="view_order_field" name="view_order_field" type="hidden">
										<input id="view_order_mode" name="view_order_mode" value="DESC" type="hidden"> -->

										<!-- Search Form -->
										<!-- <form id="CoreSearcherForm" name="CoreSearcherForm" method="GET"> -->

										<input id="view_page" name="view_page" value="{{ $results->currentPage() }}" type="hidden">
										<input id="last_page" name="last_page" value="{{ $results->lastPage() }}" type="hidden">
										<input id="per_page" name="per_page" value="{{ $results->perPage() }}" type="hidden">
										<input id="total_regs" name="total_regs" value="{{ $results->total() }}" type="hidden">
										{!! Form::open( [ 'id' => 'CoreSearcherForm', 'route' => 'student_list', 'method' => 'GET', 'role' => 'search' ] )  !!}

												<input id="view_order_field" name="" value="{{ app( 'request' )->input( 'view_order_field' ) }}" type="hidden">

												<input id="view_order_mode" name="" value="{{ app( 'request' )->input( 'view_order_mode' ) }}" type="hidden">

												<div class="row">

														<div class="input-group col-lg-3 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

																@if( app( 'request' )->input( 'view_order_field' ) == 'nro_inscripcion' )

																		@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="nro_inscripcion" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

																		@else

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="nro_inscripcion" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

																		@endif

																@else

																		<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="nro_inscripcion" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

																@endif

																<input id="inscription_id" name="inscription_id" value="{{ app( 'request' )->input( 'inscription_id' ) }}" class="form-control" placeholder="Nro de Inscripción" type="text">
														</div>

														<div class="input-group col-lg-3 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

																@if( app( 'request' )->input( 'view_order_field' ) == 'nombres' )

																		@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="nombres" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

																		@else

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="nombres" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

																		@endif

																@else

																		<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="nombres" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

																@endif

																<input id="first_name" name="first_name" value="{{ app('request')->input('first_name') }}" class="form-control" placeholder="Nombre" type="text">
														</div>

														<div class="input-group col-lg-3 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

																@if( app( 'request' )->input( 'view_order_field' ) == 'apellido' )

																		@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="apellido" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

																		@else

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="apellido" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

																		@endif

																@else

																		<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="apellido" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

																@endif

																<input id="last_name" name="last_name" value="{{ app('request')->input('last_name') }}" class="form-control" placeholder="Apellido" type="text">
														</div>

														<div class="input-group col-lg-3 col-md-3 col-sm-5 col-xs-11" style="margin:2px;">

																@if( app( 'request' )->input( 'view_order_field' ) == 'fecha_inscripcion' )

																		@if( app( 'request' )->input( 'view_order_mode' ) == 'desc' )

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="fecha_inscripcion" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-desc"></i></span>

																		@else

																				<span class="input-group-addon order-arrows sort-activated hint--bottom-right hint--bounce" order="fecha_inscripcion" mode="asc" aria-label="Ordenar de Mayor a Menor"><i class="fa fa-sort-alpha-asc"></i></span>

																		@endif

																@else

																		<span class="input-group-addon order-arrows hint--bottom-right hint--bounce" order="fecha_inscripcion" mode="desc" aria-label="Ordenar de Menor a Mayor"><i class="fa fa-sort-alpha-asc"></i></span>

																@endif


																<input id="inscription_date" name="inscription_date" value="{{ app('request')->input('inscription_date') }}" class="form-control" placeholder="Fecha Inscripción" type="text">
														</div>

												</div>

												<!-- Submit Search Buttons -->
												<button type="button" class="btn btn-green searchButton">Buscar</button>
												<button type="button" class="btn btn-grey" id="ClearSearchFields">Limpiar</button>
												<!-- /Submit Search Buttons -->

										{!! Form::close() !!}
										<!-- </form> -->
										<!-- /Search Form -->
										<!-- Decoration Arrow -->
										<div class="arrow-right-border">
												<div class="arrow-right-sf"></div>
										</div>
										<!-- /Decoration Arrow -->

								</div>
								<!-- /SearchFieldsForm -->

						</div>
						<!-- /Search Filters -->

						<!-- Massive Action Buttons -->

						<!-- Select All -->
						<button aria-label="Seleccionar todos" type="button" id="SelectAll" class="btn animated fadeIn NewElementButton hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
						<!-- Deselect All -->
						<button type="button" aria-label="Deseleccionar todos" id="UnselectAll" class="btn animated fadeIn NewElementButton Hidden hint--bottom-right hint--bounce"><i class="fa fa-square"></i></button>
						<!-- Delete Selected -->
						<button type="button" aria-label="Eliminar Seleccionados" msgok="¡Los artículos han sido eliminados con éxito!" msgerror="Hubo un error al intentar eliminar los artículos." msgquestion="¿Desea eliminar los artículos seleccionados?" title="Borrar registros seleccionados" class="btn bg-red animated fadeIn NewElementButton Hidden DeleteSelectedElements hint--bottom hint--bounce hint--error"><i class="fa fa-trash-o"></i></button>
						<!-- Activate Selected -->
						<button type="button" aria-label="Activar Seleccionados" msgok="¡Los artículos han sido activados con éxito!" msgerror="Hubo un error al intentar activar los artículos." msgquestion="¿Desea activar los artículos seleccionados?" class="btn btn-green animated fadeIn NewElementButton Hidden ActivateSelectedElements hint--bottom hint--bounce hint--success"><i class="fa fa-check-circle"></i></button>
						<!-- Expand Selected -->
						<button type="button" aria-label="Expandir Seleccionados" class="btn bg-navy animated fadeIn NewElementButton Hidden ExpandSelectedElements hint--bottom hint--bounce hint--primary"><i class="fa fa-plus"></i></button>
						<!-- Contract Selected -->
						<button type="button" aria-label="Contraer Seleccionados" class="btn bg-navy animated fadeIn NewElementButton Hidden ContractSelectedElements hint--bottom hint--bounce hint--primary"><i class="fa fa-minus"></i></button>
						<!-- Create New -->
						<!-- <a href="/articulos/crear/" class="hint--bottom hint--bounce hint--success" aria-label="Nuevo Artículo"><button type="button" class="NewElementButton btn btn-green animated fadeIn"><i class="fa fa-plus-square-o"></i></button></a> -->

						<!-- /Massive Action Buttons -->

						<!-- Hidden List Fields -->
						<input id="selected_ids" name="selected_ids" value="" type="hidden">
						<input id="totalregs" name="totalregs" value="{{ $results->total() }}" type="hidden">
						<!-- /Hidden List Fields -->

						<!-- Display Buttons -->
						<div class="changeView">
							<button aria-label="Buscar" class="ShowFilters SearchElement btn hint--bottom hint--bounce"><i class="fa fa-search"></i></button>
						</div>
						<!-- Display Buttons -->

				</div>
				<!-- /Box Header -->

				<!-- Box Body -->
				<div class="box-body" id="CoreSearcherResults">

						<!-- contentContainer -->
						<div class="contentContainer txC" id="SearchResult">

								<!-- ListView -->
								<div class="row ListView ListElement animated fadeIn ">

										<!-- container-fluid -->
										<div class="container-fluid">

												@if( $results->count() < 1 )

														<div class="callout callout-info">

																<h4>

																		<i class="icon fa fa-info-circle"></i> No se encontraron usuarios.

																</h4>

																<p>Puede crear un usuario haciendo <a href="{{ route( 'user_create' ) }}">click aqui</a>.</p>

														</div>


												@endif

												<!-- Registers -->
												@php

														$rowColor = ' listRow2 ';

												@endphp

												@foreach( $results as $element )

														@php

																$rowColor = $rowColor == ' listRow2 '? '':' listRow2 ';

														@endphp

														<!-- Row -->
														<div class="row listRow {{$rowColor}} " id="row_{{ $element->nro_documento }}">

																<!-- Col -->
																<div class="form-group col-lg-3 col-md-4 col-sm-4 list-col-container">
																		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 list-select-btn-container">
																				<button aria-label="Seleccionar" type="button" id="select_{{$element->nro_documento}}" class="SelectRowButton btn btn-default animated fadeIn hint--bottom-right hint--bounce"><i class="fa fa-square-o"></i></button>
																		</div>
																		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-10">
																				<div class="listRowInner">
																						<img class="img-circle hideMobile" src="/views/users/images/default/default.jpg">
																						<span class="listTextStrong">{{ $element->nombres }} {{ $element->apellido }}</span>
																						<span class="smallTitle"><b>(Inscripción: {{ $element->nro_inscripcion }})</b></span>
																				</div>
																		</div>
																</div>
																<!-- /Col -->

																<!-- Col -->

																<!-- /Col -->

																<!-- Col -->
																<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
																		<div class="listRowInner">
																				<span class="smallTitle">Fecha Inscripción</span>
																				<span class="listTextStrong">
																						<span class="label label-info">{{$element->fecha_inscripcion}}</span>
																				</span>
																		</div>
																</div>
																<!-- /Col -->

																<!-- Col -->

																<!-- /Col -->

																<!-- Col -->
																<div class="col-lg-1 col-md-1 col-sm-1 hideMobile"></div>
																<!-- /Col -->

																<!-- Detailed Information -->
																<div class="animated DetailedInformation Hidden col-md-12">

																		<div class="list-margin-top">

																				<div class="row bg-gray" style="padding:5px;">
																						INFORMACIÓN EXTRA
																				</div>

																		</div>

																</div>
																<!-- /Detailed Information -->

																<!-- Row Actions -->
																<div class="listActions flex-justify-center Hidden">

																		<div>

																				<!-- roundItemActionsGroup -->
																				<span class="roundItemActionsGroup">

																						<!-- Expand Button -->
																						<a class="hint--bottom hint--bounce" aria-label="Mostrar más información">
																								<button type="button" class="btn bg-navy ExpandButton" id="expand_{{$element->nro_documento}}"><i class="fa fa-plus"></i></button>
																						</a>

																						<!-- Show Button -->
																						<a class="hint--bottom hint--bounce" aria-label="Ver Detalle" href="/usuarios/{{$element->user}}" id="view_{{$element->nro_documento}}">
																								<button type="button" class="btn btn-github"><i class="fa fa-eye"></i></button>
																						</a>

																						<!-- Edit Button -->
																						<a href="/usuarios/editar/{{$element->nro_documento}}/" class="hint--bottom hint--bounce hint--info" aria-label="Editar">
																								<button type="button" class="btn btn-blue"><i class="fa fa-pencil"></i></button>
																						</a>



																				</span>
																				<!-- /roundItemActionsGroup -->

																		</div>

																</div>
																<!-- /Row Actions -->

														</div>
														<!-- /Row -->



												@endforeach
												<!-- /Registers -->

										</div>
										<!-- container-fluid -->

								</div>
								<!-- /ListView -->

						</div>
						<!-- /contentContainer -->

				</div>
				<!-- /Box Body -->

				<!-- Box Footer -->
				<div class="box-footer clearfix">

						@if( $results->total() > 0 )

						<!-- Paginator -->
						<div class="form-inline paginationLeft">

								<div class="row">

										<!-- Change Regs Per View -->
										<div class="col-xs-5 col-sm-1 col-md-1 txC">

												<div style="max-width:100px;" class="Hidden" id="RegsPerViewDiv">

														{{ Form::chosen( 'regsperview', [ "5" => 5, "10" => 10, "25" => 25, "50" => 50, "100" => 100 ] , $results->perPage(), [ 'extra' => ' tabindex="10"' ] ) }}

												</div>

												<div id="RegsPerViewButton">

														<button type="button" class="btn btn-github hint--top hint--bounce hint--info" aria-label="Cambiar la cantidad de registros que se muestran"><i class="fa fa-list-alt "></i></button>

												</div>

										</div>
										<!-- /Change Regs Per View -->


										<!-- Total Rows -->
										<div class="col-xs-7 col-sm-2 col-md-2">

												<span class="pull-right" style="margin:0px;padding:0px;margin-top:5px;">

														Mostrando&nbsp; {{ $results->count() }} &nbsp;de

														<b>

																<span id="TotalRegs">{{$results->total()}}</span>

														</b>

												</span>

										</div>
										<!-- /Total Rows -->

										<!-- Page Redirect -->
										<div class="col-xs-12 col-sm-2 col-md-2 txC">

												<div class="row">

														{!! Form::open( [ 'id' => 'GoToPageForm', '' ] )  !!}

																<div class="col-xs-4 txR" style="margin-right:0px;padding-right:2px;margin-top:5px;">
																		Página N°
																</div>

																<div class="col-xs-4" style="margin:0px;padding:0px;">
																		<input type="text" id="go_to_page" class="GoToPage input-sm form-control" placeholder="0" style="width:100%;" validateOnlyNumbers="Ingrese números únicamente." validateMaxValue="{{ $results->lastPage() }}///Ingrese una página menor o igual a {{ $results->lastPage() }}" validateMinValue="1///Ingrese una página mayor a 0." />
																</div>

																<div class="col-xs-4 txL" style="margin-left:0px;padding-left:2px;">
																		<button type="button" url="" id="go_to_page_button" name="button" class="GoToPageBtn btn btn-sm btn-github" style="margin:0px;">Ir</button>
																</div>

														{!! Form::close() !!}

												</div>

										</div>
										<!-- /Page Redirect -->

										<!-- Page Links -->
										<div class="col-xs-12 col-sm-6 col-md-6">

												<div class="pull-right">
														{{ $results->links() }}
												</div>

										</div>
										<!-- /Page Links -->

								</div>

						</div>
						<!-- /Paginator -->

						@endif

				</div>
				<!-- /Box Footer -->

		</div>
		<!-- /Box -->

@endsection
