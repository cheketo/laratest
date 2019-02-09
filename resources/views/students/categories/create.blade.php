@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title' )

	<i class="{{ session( 'active_route' )->menus[ 0 ]->icon }}"></i> {{ session( 'active_route' )->menus[ 0 ]->title_menu }}

@endsection

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'styles' )

@endsection

@section( 'scripts' )

	{{ HTML::script( '/views/students/categories/js/main.js' ) }}

	{{ HTML::script( '/views/students/categories/js/create.js' ) }}

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

														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> Nombre {{ Form::hint( 'Nombre que tendrá la categoría de alumno' ) }}</h4>

														<div class="form-group">
																<input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la Categoría" tabindex="1" validateEmpty="El nombre es obligatorio." validateFromFile="/student/category/validate/name///El nombre del la categoría ya existe">
														</div>

														<h4 class="subTitleB"><i class="fa fa-list-alt"></i> Descripción {{ Form::hint( 'Descripción de la categoría de alumno' ) }}</h4>

														<div class="form-group">
																<textarea name="description" id="description" class="form-control" placeholder="Descripción de la Categoría" tabindex="2" rows="8" cols="80"></textarea>
														</div>

														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> ID en Guaraní {{ Form::hint( 'ID para relacionar las categorías con las categorías de Guarní' ) }}</h4>

														<div class="form-group">
																<input type="text" name="foreign" id="foreign" class="form-control" placeholder="ID de la categoría" tabindex="3" validateEmpty="La categoría de Guarní es obligatoria." data-inputmask="'mask': '9{+}'" validateFromFile="/student/category/validate/foreign///El ID del la categoría ya está relacionado con guaraní" validateMinValue="1///Ingrese un ID mayor a 0">
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

						<button type="button" class="btn btn-green" id="BtnCreate" tabindex="100"><i class="fa fa-plus"></i> Crear Nueva Categoría</button>

						<button type="button" class="btn btn-blue" id="BtnCreateNext" tabindex="101"><i class="fa fa-plus"></i> Crear y Agregar Otra</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
