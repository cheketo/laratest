@extends( 'layouts.private' )

@if( count( session( 'active_route' )->menus ) > 0 )

		@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )



		@section( 'page_title' )

			<i class="{{ session( 'active_route' )->menus[ 0 ]->icon }}"></i> {{ session( 'active_route' )->menus[ 0 ]->title_menu }}

		@endsection

		@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@endif

@section( 'styles' )

	{{ HTML::style( '/css/list.css' ) }}

	@include( $viewPath . '.list.styles' )

@endsection

@section( 'scripts' )

	{{ HTML::script( 'js/list.js' ) }}

	@include( $viewPath . '.list.scripts' )

@endsection

@include( $viewPath . '.list.fields' )

@include( $viewPath . '.list.buttons' )

@include( $viewPath . '.list.container' )

@section( 'content' )

		<div class="box box-primary">

				<!-- Box Header -->
				<div class="box-header with-border">

						<!-- Search Filters -->
						<div class="SearchFilters searchFiltersHorizontal animated fadeIn Hidden" style="margin-bottom:10px;">

								<!-- SearchFieldsForm -->
								<div class="form-inline" id="SearchFieldsForm">

										<input id="view_page" name="view_page" value="{{ $results->currentPage() }}" type="hidden">
										<input id="last_page" name="last_page" value="{{ $results->lastPage() }}" type="hidden">
										<input id="per_page" name="per_page" value="{{ $results->perPage() }}" type="hidden">
										<input id="total_regs" name="total_regs" value="{{ $results->total() }}" type="hidden">
										{!! Form::open( [ 'id' => 'CoreSearcherForm', 'route' => $formRoute, 'method' => 'GET', 'role' => 'search' ] )  !!}

												<input id="view_order_field" name="" value="{{ app( 'request' )->input( 'view_order_field' ) }}" type="hidden">

												<input id="view_order_mode" name="" value="{{ app( 'request' )->input( 'view_order_mode' ) }}" type="hidden">

												<div class="row">

														@yield( 'search_fields' )

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

						@yield( 'action_buttons' )

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

										@yield( 'container' )

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

														<button type="button" class="btn btn-github hint--top hint--bounce" aria-label="Cambiar la cantidad de registros que se muestran"><i class="fa fa-list-alt "></i></button>

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

@php

	$viewPath = 'careers';

@endphp
