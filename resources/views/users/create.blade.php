@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title', session( 'active_route' )->menus[ 0 ]->title_menu )

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'scripts' )

	{{ HTML::script( '/views/users/js/main.js' ) }}

	{{ HTML::script( '/views/users/js/create.js' ) }}

@endsection

@section( 'content' )

		<input type="hidden" name="newimage" id="newimage" value="">

		<!-- box -->
		<div class="box box-success">

				<!-- box-header -->
				<div class="box-header with-border">

						<h3 class="box-title">Complete el formulario</h3>

				</div>
				<!-- /box-header -->

				<!-- .box-body -->
				<div class="box-body">

						<div class="row">

								<!-- User Data -->
								<div class="col-md-6">

										<div class="flex-allCenter innerContainer">

												<div class="mw100">

														<h4 class="subTitleB"><i class="fa fa-pencil"></i> Datos Principales</h4>

														<br>

														<div class="form-group">
																<input type="text" name="user" id="user" class="form-control" placeholder="Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateMinLength="3///El usuario debe contener 3 caracteres como mínimo" validateFromFile="/user/validate/user///El usuario ya existe">
														</div>

														<br>

														<div class="form-group">
																<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" validateEmpty="La contraseña es obligatoria" value="" tabindex="2" validateMinLength="4///La contraseña debe contener 4 caracteres como mínimo">
														</div>

														<br>

														<div class="form-group">
																<input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirmar Contraseña" validateEmpty="La confirmación de contraseña es obligatoria." value="" tabindex="3" validateEqualToField="password///Las contraseñas deben coincidir.">
														</div>

														<br>

														<div class="form-group">
																<input type="email" id="email" name="email" value="" class="form-control" placeholder="Email" validateEmail="Ingrese un email válido" validateMinLength="4///El email debe contener 4 caracteres como mínimo." tabindex="4" validateEmpty="El email es obligatorio." validateFromFile="/user/validate/email///El email ya existe">
														</div>

														<br>

														<div class="form-group">
																<input type="text" id="first_name" name="first_name" class="form-control" placeholder="Nombre" validateEmpty="El nombre es obligatorio" validateMinLength="2///El nombre debe contener 2 caracteres como mínimo." tabindex="5" value="">
														</div>

														<br>

														<div class="form-group">
																<input type="text" id="last_name" name="last_name" class="form-control" placeholder="Apellido" validateEmpty="El apellido es obligatorio." validateMinLength="2///El apellido debe contener 2 caracteres como mínimo." tabindex="6" value="">
														</div>

												</div>

										</div>

								</div>
								<!-- /User Data -->

								<!-- Roles -->
								<div class="col-md-6">

										<div class="innerContainer">

												<div class="row">

														<div class="col-md-12">

																<div class="form-group">

																		<h4 class="subTitleB"><i class="fa fa-lock"></i> Perfiles</h4>

																		<br>

																		{{ Form::multiple( 'roles', App\Http\Controllers\RoleController::getSelectValues(), array(), [ 'placeholder' => 'Seleccione los perfiles.', 'extra' => 'validateEmpty="El perfil es obligatorio." tabindex="7"' ] ) }}

																</div>

														</div>

												</div>

										</div>

								</div>
								<!-- Roles -->

								<!-- Actual Image -->
								<div class="col-md-6">

										<div class="imagesContainer">

												<h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;gen del Usuario</h4>

												<div class="flex-allCenter imgSelector">

														<div class="imgSelectorInner" tabindex="8">

																<img src="/views/users/images/default/default.jpg" class="img-responsive MainImg animated">

																<input type="file" id="image" name="image" class="Hidden" value="" accept="image/*">

																<div class="imgSelectorContent">

																		<div id="SelectImg">

																				<i class="fa fa-upload"></i><br>

																				<p>Cargar Nueva Im&aacute;gen</p>

																		</div>

																</div>

														</div>

												</div>

												<div class="text-bottom">

														<p><i class="fa fa-info-circle" aria-hidden="true"></i> Haga Click sobre la im&aacute;gen </br> para cargar una desde su dispositivo</p>

												</div>

										</div>

								</div>
								<!-- /Actual Image -->

						</div>
						<!-- row -->

						<!-- Generic Images -->
						<div class="row imagesMain">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

										<div class="imagesContainer">

												<h4 class="subTitleB"><i class="fa fa-picture-o"></i> Im&aacute;genes Gen&eacute;ricas</h4>

												<div class="text-bottom">

			 											<p><i class="fa fa-info-circle" aria-hidden="true"></i> Seleccione una im&aacute;gen para utilizarla</p>

												</div>

												<div class="smallThumbsList flex-justify-center">

														<ul>

																@foreach($images as $key => $image)

																		<li><img src="/views/users/images/default/{{ $image }}" tabindex="{{ ( $key + 9 ) }}" class="ImgSelecteable"></li>

																@endforeach

														</ul>

												</div>



										</div>

								</div>

						</div>
						<!-- /Generic Images -->

				</div>
				<!-- /box-body -->

				<!-- box-footer -->
				<div class="box-footer txC">

						<button type="button" class="btn btn-green" id="BtnCreate" tabindex="100"><i class="fa fa-plus"></i> Crear Nuevo Usuario</button>

						<button type="button" class="btn btn-blue" id="BtnCreateNext" tabindex="101"><i class="fa fa-plus"></i> Crear y Agregar Otro</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
