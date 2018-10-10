@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title' )

	<i class="{{ session( 'active_route' )->menus[ 0 ]->icon }}"></i> {{ session( 'active_route' )->menus[ 0 ]->title_menu }}

@endsection

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'styles' )

		{{ HTML::style( '/vendor/iCheck/all.css' ) }}

@endsection

@section( 'scripts' )

	{{ HTML::script( '/views/routes/js/main.js' ) }}

	{{ HTML::script( '/views/routes/js/create.js' ) }}

	{{ HTML::script( '/vendor/iCheck/icheck.min.js' ) }}

	{{ HTML::script( '/vendor/inputmask/inputmask.min.js' ) }}

	{{ HTML::script( '/vendor/inputmask/jquery.inputmask.min.js' ) }}

@endsection

@section( 'content' )

		<!-- box -->
		<div class="box box-success">

				<!-- .box-body -->
				<div class="box-body">

						<div class="row">

								<div class="col-xs-12 col-sm-6 col-md-6">

										<div class="flex-allCenter innerContainer">

												<div class="mw100">


														<!-- Route Name -->
														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> Nombre {{ Form::hint( 'Nombre que representará la ruta' ) }}</h4>

														<div class="form-group">
																<input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la Ruta" tabindex="1" validateEmpty="El nombre es obligatorio.">
														</div>

														<!-- Route Link -->
														<h4 class="subTitleB"><i class="fa fa-link"></i> Link {{ Form::hint( 'Link al que responderá la ruta' ) }}</h4>

														<div class="form-group">
																<input type="text" name="route" id="route" class="form-control" placeholder="Link de la Ruta" tabindex="2" validateEmpty="El link es obligatorio.">
														</div>

														<!-- Route Permission -->
														<h4 class="subTitleB"><i class="fa fa-key"></i> Tipo de Acceso {{ Form::hint( 'El tipo de acceso indica que tipo de usuario puede acceder a la ruta' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'permission', $permissions, '', [ 'placeholder' => 'Seleccionar Acceso', 'extra' => 'validateEmpty="El acceso es obligatorio." tabindex="3"' ] ) }}
														</div>

														<!-- Route Verb -->
														<h4 class="subTitleB"><i class="fab fa-vuejs"></i> Verbo del Link {{ Form::hint( 'Verbo con el que se puede acceder a la ruta' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'verb', $verbs, '', [ 'placeholder' => 'Seleccionar Verbo', 'extra' => 'validateEmpty="El verbo es obligatorio." tabindex="4"' ] ) }}
														</div>

														<div class="ViewFields">

																<!-- Route View -->
																<h4 class="subTitleB"><i class="fa fa-file-invoice"></i> Vista {{ Form::hint( 'Ubicación del archivo de la vista (En Laravel)' ) }}</h4>

																<div class="form-group">
																		<input type="text" name="view" id="view" class="form-control" placeholder="Vista de la Ruta" tabindex="5" validateEmpty="La vista es obligatoria.">
																</div>

														</div>

														<div class="NoViewFields">

																<!-- Route Controller -->
																<h4 class="subTitleB"><i class="fa fa-file-alt"></i> Controldor {{ Form::hint( 'El controlador es la clase que se encarga de procesar el link' ) }}</h4>

																<div class="form-group">
																		{{ Form::chosen( 'controller', $controllers, '', [ 'placeholder' => 'Seleccionar Controlador', 'extra' => 'validateEmpty="El controlador es obligatorio." tabindex="6"' ] ) }}
																</div>

																<!-- Route Method -->
																<h4 class="subTitleB"><i class="fab fa-elementor"></i> Método {{ Form::hint( 'Método del controlador que procesará el link' ) }}</h4>

																<div class="form-group">
																		<input type="text" name="method" id="method" class="form-control" placeholder="Método de la Ruta" tabindex="7" validateEmpty="El método es obligatorio.">
																</div>

														</div>

												</div>

										</div>

								</div>
								<!-- col -->

								<div class="col-xs-12 col-sm-6">

										<div class="innerContainer">

												<!-- Route Middlewares -->
												<input type="hidden" name="middlewares" id="middlewares" value="">

												<h4 class="subTitleB"><i class="fa fa-lock"></i> Middlewares {{ Form::hint( 'Los middlewares son instancias en las cuales se ejecutan acciones de chequeo de seguridad, manipulación de datos y redireccionamiento', 'bottom' ) }}</h4>

												<div class="form-group">

														<div class="row">

																<div class="col-xs-12 col-sm-11" style="margin:0px;padding-right:0px;">

																		{{ Form::chosen( 'middleware', $middlewares, '', [ 'placeholder' => 'Seleccionar Middleware', 'extra' => 'tabindex="8"', 'fieldvalue' => 'name'] ) }}

																</div>

																<div class="col-xs-12 col-sm-1" style="margin:0px;padding-left:5px;">

																		<button type="button" id="addMiddleware" class="btn btn-primary hint--info hint--bottom hint--bounce" aria-label="Agregar" style="cursor:cell;" tabindex="8">
																			<i class="fa fa-plus-circle"></i>
																		</button>

																</div>

														</div>

												</div>

												<!-- Route Middlewares Table -->
												<table id="middlewareTable" class="table table-striped table-hover Hidden">

						                <thead>

																<tr>

						                  			<th style="width:40px" class="txC">Posición</th>
									                  <th class="txC">Nombre</th>
									                  <th>Descripción</th>
									                  <th style="width: 40px"></th>

						                		</tr>

						              	</thead>

														<tbody id="tableBody">



						              	</tbody>

												</table>

										</div>

								</div>
								<!-- col -->

						</div>
						<!-- row -->

				</div>
				<!-- /box-body -->

				<!-- box-footer -->
				<div class="box-footer txC">

						<button type="button" class="btn btn-green" id="BtnCreate" tabindex="100"><i class="fa fa-plus"></i> Crear Nueva Ruta</button>

						<button type="button" class="btn btn-blue" id="BtnCreateNext" tabindex="101"><i class="fa fa-plus"></i> Crear y Agregar Otra</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
