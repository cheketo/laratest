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
														<h4 class="subTitleB"><i class="fa fa-lock"></i> Tipo de Acceso {{ Form::hint( 'El tipo de acceso indica que tipo de usuario puede acceder a la ruta' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'permission', $permissions, '', [ 'placeholder' => 'Seleccionar Acceso', 'tabindex' => '3', 'extra' => 'validateEmpty=El acceso es obligatorio."' ] ) }}
														</div>

														<!-- Route Verb -->
														<h4 class="subTitleB"><i class="fab fa-vuejs"></i> Verbo del Link {{ Form::hint( 'Verbo con el que se puede acceder a la ruta' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'verb', $verbs, '', [ 'placeholder' => 'Seleccionar Verbo', 'tabindex' => '4', 'extra' => 'validateEmpty="El verbo es obligatorio."' ] ) }}
														</div>

														<div class="ViewFields">

																<!-- Route View -->
																<h4 class="subTitleB"><i class="fa fa-file-invoice"></i> Vista {{ Form::hint( 'Ubicación del archivo de la vista (En Laravel)' ) }}</h4>

																<div class="form-group">
																		<input type="text" name="view" id="view" class="form-control" placeholder="Vista de la Ruta" tabindex="6" validateEmpty="La vista es obligatoria.">
																</div>

														</div>
														

														<div class="NoViewFields">

																<!-- Route Controller -->
																<h4 class="subTitleB"><i class="fa fa-file-alt"></i> Controldor {{ Form::hint( 'El controlador es la clase que se encarga de procesar el link' ) }}</h4>

																<div class="form-group">
																		{{ Form::chosen( 'controller', $controllers, '', [ 'placeholder' => 'Seleccionar Controlador', 'tabindex' => '5', 'extra' => 'validateEmpty="El controlador es obligatorio."' ] ) }}
																</div>

																<!-- Route Method -->
																<h4 class="subTitleB"><i class="fab fa-elementor"></i> Método {{ Form::hint( 'Método del controlador que procesará el link' ) }}</h4>

																<div class="form-group">
																		<input type="text" name="method" id="method" class="form-control" placeholder="Método de la Ruta" tabindex="6" validateEmpty="El método es obligatorio.">
																</div>

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

						<button type="button" class="btn btn-green" id="BtnCreate" tabindex="100"><i class="fa fa-plus"></i> Crear Nuevo Perfil</button>

						<button type="button" class="btn btn-blue" id="BtnCreateNext" tabindex="101"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
