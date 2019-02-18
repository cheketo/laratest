@extends( 'layouts.private' )

@section( 'tab_title', session( 'active_route' )->menus[ 0 ]->title_tab )

@section( 'page_title', session( 'active_route' )->menus[ 0 ]->title_menu )

@section( 'page_subtitle', session( 'active_route' )->menus[ 0 ]->title_page )

@section( 'styles' )

		{{ HTML::style( '/vendor/iCheck/all.css' ) }}

@endsection

@section( 'scripts' )

	{{ HTML::script( '/views/customers/js/main.js' ) }}

	{{ HTML::script( '/views/customers/js/create.js' ) }}

	{{ HTML::script( '/vendor/inputmask/jquery.inputmask.bundle.min.js' ) }}

	{{ HTML::script( '/vendor/iCheck/icheck.min.js' ) }}

@endsection

@section( 'content' )

		<div class="row">

				<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">

						<div class="box box-primary">

								<div class="box-body box-profile">

										<div class="imagesContainer">

												<h4 class="subTitleB form-field-title"><i class="fa fa-picture-o form-field-title text-info"></i> Imagen del Cliente</h4>

												<div class="flex-allCenter imgSelector">

														<div class="imgSelectorInner" tabindex="8">

																<img src="/views/customers/images/default/default.png" class="img-responsive MainImg animated">

																<input type="file" id="image" name="image" class="Hidden" value="" accept="image/*">

																<div class="imgSelectorContent">

																		<div id="SelectImg">

																				<i class="fa fa-upload"></i><br>

																				<p>Cargar Nueva Imagen</p>

																		</div>

																</div>

														</div>

												</div>

												<div class="text-bottom">

														<p><i class="fa fa-info-circle" aria-hidden="true"></i> Haga Click sobre la imagen </br> para cargar una desde su dispositivo</p>

												</div>

										</div>

								</div>

						</div>

				</div>

				<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">

					<div class="nav-tabs-custom">

							<ul class="nav nav-tabs">

									<li class="active" ><a href="#basic_info" data-toggle="tab" aria-expanded="true" class="form-field-title">{{ Form::hint( 'Datos básicos para crear un cliente', 'bottom', 'fas fa-money-check' ) }} Cliente</a></li>

									<li class=""><a href="#contact_info" data-toggle="tab" aria-expanded="false" class="form-field-title">{{ Form::hint( 'Datos de contacto', 'bottom', 'fas fa-comments' ) }} Contacto</a></li>

									<li class=""><a href="#accounting_info" data-toggle="tab" aria-expanded="false" class="form-field-title">{{ Form::hint( 'Datos contables', 'bottom', 'fas fa-money-check-alt' ) }} Contabilidad</a></li>

									<li class=""><a href="#branches_info" data-toggle="tab" aria-expanded="false" class="form-field-title">{{ Form::hint( 'Sucursales y datos de locación', 'bottom', 'fas fa-warehouse' ) }} Sucursales</a></li>

									<li class=""><a href="#employees_info" data-toggle="tab" aria-expanded="false" class="form-field-title">{{ Form::hint( 'Representantes y empleados de la empresa', 'bottom', 'fab fa-redhat' ) }} Representantes</a></li>

							</ul>
							<div class="tab-content">

									<!-- Company Info -->
									<div class="tab-pane active" id="basic_info">

											<h4 class="subTitleB"><i class="fas fa-id-badge"></i> Nombre</h4>

											<div class="form-group">

													<input type="text" name="name" id="name" class="form-control" placeholder="Nombre" tabindex="1" validateEmpty="El nombre es obligatorio." validateFromFile="/company/validate/name///El nombre del cliente ya existe">

											</div>

											<h4 class="subTitleB"><i class="fas fa-address-card"></i> Perfil de Empresa</h4>

											<div class="form-group">

													{{ Form::chosen( 'company_profile', $companyProfiles, 0, [ 'placeholder' => 'Seleccionar perfil de empresa', 'tabindex' => '2', 'extra' => 'validateEmpty="Seleccione el perfil de empresa"', 'fieldvalue' => 'name' ] ) }}

											</div>

											<div class="form-group">

													{{ Form::icheckbox( 'is_provider', 1, false, [ 'color' => '', 'shape' => 'flat' ] ) }} <strong><span class="text-blue">También es proveedor</span></strong>

											</div>

									</div>
									<!-- Company Info -->

									<!-- Contact Info -->
									<div class="tab-pane" id="contact_info">

											<h4 class="subTitleB"><i class="fas fa-envelope"></i> Email</h4>

											<div class="form-group">

													<input type="text" name="email" id="email" class="form-control" placeholder="Email" tabindex="1" validateEmail="Ingrese un email válido" >

											</div>

											<h4 class="subTitleB"><i class="fas fa-globe"></i> Sitio Web</h4>

											<div class="form-group">

													<input type="text" name="website" id="website" class="form-control" placeholder="Sitio Web" tabindex="2" >

											</div>

											<h4 class="subTitleB"><i class="fas fa-phone-square"></i> Teléfono</h4>

											<div class="form-group">

													<input type="text" name="phone" id="phone" class="form-control" placeholder="Teléfono" tabindex="3" >

											</div>

											<h4 class="subTitleB"><i class="fab fa-whatsapp"></i> WhatsApp</h4>

											<div class="form-group">

													<input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="WhatsApp" tabindex="4" >

											</div>

											<h4 class="subTitleB"><i class="fab fa-facebook"></i> Facebook</h4>

											<div class="form-group">

													<input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook" tabindex="5" >

											</div>

									</div>
									<!-- Contact Info -->

									<!-- Accounting Info -->
									<div class="tab-pane" id="accounting_info">

											<h4 class="subTitleB"><i class="fas fa-cash-register"></i> Condición IVA</h4>

											<div class="form-group">

													{{ Form::chosen( 'company_type', $companyTypes, 0, [ 'placeholder' => 'Seleccionar condición IVA', 'tabindex' => '1', 'fieldvalue' => 'name' ] ) }}

											</div>

											<h4 class="subTitleB"><i class="fas fa-barcode"></i> C.U.I.T.</h4>

											<div class="form-group">

													<input type="text" name="cuit" id="cuit" class="form-control inputMask" placeholder="C.U.I.T." tabindex="2" data-inputmask="'mask': '99-99999999-9'" >

											</div>

											<h4 class="subTitleB"><i class="fas fa-ticket-alt"></i> Ingresos Brutos</h4>

											<div class="form-group">

													<input type="text" name="gross_income" id="gross_income" class="form-control" placeholder="Ingresos Brutos" tabindex="3" >

											</div>

											<h4 class="subTitleB"><i class="fas fa-money"></i> Balance Inicial</h4>

											<div class="form-group">

													<input type="text" name="balance" id="balance" class="form-control inputMask" placeholder="Balance" tabindex="4" data-inputmask="'mask': '$9{+}[.99]'">

											</div>

									</div>
									<!-- Accounting Info -->

									<!-- Branches Info -->
									<div class="tab-pane" id="branches_info">



									</div>
									<!-- Branches Info -->

									<!-- Employees Info -->
									<div class="tab-pane" id="employees_info">



									</div>
									<!-- Employees Info -->

							</div>

						</div>

				</div>

		</div>

@endsection
