@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title' )

	<i class="{{ session( 'active_route' )->menus[ 0 ]->icon }}"></i> {{ session( 'active_route' )->menus[ 0 ]->title_menu }}

@endsection

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'scripts' )

	{{ HTML::script( '/views/middlewares/js/main.js' ) }}

	{{ HTML::script( '/views/middlewares/js/create.js' ) }}

@endsection

@section( 'content' )

		<!-- box -->
		<div class="box box-success">

				<!-- .box-body -->
				<div class="box-body">

						<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">

										<div class="flex-allCenter innerContainer">

												<div class="mw100">


														<!-- Middleware Name -->
														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> Nombre {{ Form::hint( 'Nombre que representará al middleware en el código. No ingresar espacios' ) }}</h4>

														<div class="form-group">
																<input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Middleware" tabindex="1" validateEmpty="El nombre es obligatorio.">
														</div>

														<!-- Middleware Class -->
														<h4 class="subTitleB"><i class="fa fa-file-alt"></i> Clase {{ Form::hint( 'Clase donde se ubica el código middleware' ) }}</h4>

														<div class="form-group">
																<input type="text" name="class" id="class" class="form-control" placeholder="Clase del Middleware" tabindex="2" validateEmpty="La clase es obligatoria.">
														</div>

														<!-- Middleware Description -->
														<h4 class="subTitleB"><i class="fa fa-info"></i> Descripción {{ Form::hint( 'Descripción que hace referencia al comportamiento del middleware' ) }}</h4>

														<div class="form-group">
																<textarea name="description" id="description" class="form-control" placeholder="Descripción del Middleware" tabindex="3" rows="4"></textarea>
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

						<button type="button" class="btn btn-green" id="BtnCreate" tabindex="100"><i class="fa fa-plus"></i> Crear Nuevo Middleware</button>

						<button type="button" class="btn btn-blue" id="BtnCreateNext" tabindex="101"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
