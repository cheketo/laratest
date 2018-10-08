@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title' )

	<i class="{{ session( 'active_route' )->menus[ 0 ]->icon }}"></i> {{ session( 'active_route' )->menus[ 0 ]->title_menu }}

@endsection

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'scripts' )

	{{ HTML::script( '/views/menus/js/main.js' ) }}

	{{ HTML::script( '/views/menus/js/create.js' ) }}

	{{ HTML::script( '/vendor/inputmask/inputmask.min.js' ) }}

	{{ HTML::script( '/vendor/inputmask/jquery.inputmask.min.js' ) }}

@endsection

@section( 'content' )

		<!-- box -->
		<div class="box box-success">

				<!-- .box-body -->
				<div class="box-body">

						<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">

										<div class="flex-allCenter innerContainer">

												<div class="mw100">

														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> Nombre {{ Form::hint( 'Nombre con el cual aparecerá en la barra de navegación' ) }}</h4>

														<div class="form-group">
																<input type="text" name="title_menu" id="title_menu" class="form-control" placeholder="Nombre Menú" tabindex="1" validateEmpty="El nombre es obligatorio.">
														</div>

														<h4 class="subTitleB"><i class="fa fa-project-diagram"></i> Padre {{ Form::hint( 'Menú que lo contendrá en la barra de navegación' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'parent', App\Http\Controllers\MenuController::getSelectValues( array(), array( 'route_id' ) ), 0, [ 'placeholder' => 'Menú Principal', 'tabindex' => '2' ] ) }}
														</div>

														<h4 class="subTitleB"><i class="fa fa-code"></i> Ruta {{ Form::hint( 'Ruta a la cual direccionará al hacer click. En caso de no tener ruta, se mostrará como un menú contenedor (sin ruta asociada)' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'route', App\Http\Controllers\WebRouteController::getSelectValues( array( [ 'verb', '=', 'get' ] ) ), 0, [ 'placeholder' => 'Sin Ruta', 'tabindex' => '3' ] ) }}
														</div>

														<h4 class="subTitleB RouteField Hidden"><i class="far fa-bookmark "></i> Nombre de Página {{ Form::hint( 'Nombre por defecto que aparecerá en la parte superior de la sección que apunta la ruta' ) }}</h4>

														<div class="form-group RouteField Hidden">
																<input type="text" name="title_page" id="title_page" class="form-control" placeholder="Nombre de Página" tabindex="4">
														</div>

														<h4 class="subTitleB RouteField Hidden"><i class="fa fa-memory"></i> Nombre de Pestaña {{ Form::hint( 'Nombre que aparecerá en la pestaña del navegador en la sección que apunta la ruta' ) }}</h4>

														<div class="form-group RouteField Hidden">
																<input type="text" name="title_tab" id="title_tab" class="form-control" placeholder="Nombre de Pestaña" tabindex="5">
														</div>

														<h4 class="subTitleB"><i class="fa fa-list-ol"></i> Posición {{ Form::hint( 'Número de posición que tendrá el menú dentro del padre que lo contiene (los valores menores se mostrarán primero)' ) }}</h4>

														<div class="form-group">
																<input type="text" name="position" id="position" class="form-control inputMask" data-inputmask="'mask': '9{+}'" placeholder="Posición" tabindex="6" validateEmpty="Ingrese una posición.">
														</div>

														<h4 class="subTitleB"><i class="fa fa-bowling-ball"></i> Ícono <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">{{ Form::hint( 'Código del ícono que aparecerá en la barra de navegación junto al nombre del menú (hacer click para ver todos los íconos)' ) }}</a></h4>

														<div class="form-group">
																<input type="text" name="icon" id="icon" class="form-control" placeholder="fa fa-icon" tabindex="7">
														</div>

												</div>

										</div>

								</div>
								<!-- col -->

						</div>
						<!-- row -->

				</div>
				<!-- /box-body -->

				<!-- box-footer -->
				<div class="box-footer txC">

						<button type="button" class="btn btn-green" id="BtnCreate" tabindex="100"><i class="fa fa-plus"></i> Crear Nuevo Menú</button>

						<button type="button" class="btn btn-blue" id="BtnCreateNext" tabindex="101"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
