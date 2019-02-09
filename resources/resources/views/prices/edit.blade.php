@extends( 'layouts.private' )

@section( 'tab_title', 'Editar Precio' )

@section( 'page_title' )

	<i class="fa fa-pencil-square"></i>Precio de <span id="name">{{ $edit->group->name }} {{ $edit->category->name }}</span>

@endsection

@section( 'page_subtitle', 'Editar' )

@section( 'scripts' )

	{{ HTML::script( '/views/prices/js/main.js' ) }}

	{{ HTML::script( '/views/prices/js/edit.js' ) }}

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

														<h4 class="subTitleB"><i class="fas fa-id-card"></i> Cantidad de Matrículas {{ Form::hint( 'Cantidad de matrículas que tendrá el grupo de carreras. Si se deja vacío significa que no se generarán matrículas a los alumnos que se inscriban en este grupo de carreras' ) }}</h4>

														<div class="form-group">
																<input type="text" name="enrollment_amount" id="enrollment_amount" class="form-control inputMask" value="{{ $edit->enrollment_amount }}" placeholder="Sin Matrículas" data-inputmask="'mask': '9{+}'" tabindex="1" validateMinValue="1///Ingrese una cantidad mayor a 0" >
														</div>

														<h4 class="subTitleB"><i class="fas fa-hand-holding-usd"></i> Precio de Matrícula {{ Form::hint( 'Precio de cada matrícula' ) }}</h4>

														<div class="form-group">
																<input type="text" name="enrollment_price" id="enrollment_price" class="form-control inputMask" value="{{ $edit->enrollment_price }}" placeholder="Precio" data-inputmask="'mask': '$9{+}[.99]'" tabindex="2" validateMinValue="1///Ingrese un precio mayor a 0" >
														</div>

														<h4 class="subTitleB"><i class="fa fa-credit-card"></i> Cantidad de Cuotas {{ Form::hint( 'Cantidad de cuotas que tendrá el grupo de carreras. Si se deja vacío significa que no se generarán cuotas a los alumnos que se inscriban en este grupo de carreras' ) }}</h4>

														<div class="form-group">
																<input type="text" name="fee_amount" id="fee_amount" class="form-control inputMask" value="{{ $edit->fee_amount }}" placeholder="Sin Cuotas" data-inputmask="'mask': '9{+}'" tabindex="3" validateMinValue="1///Ingrese una cantidad mayor a 0">
														</div>

														<h4 class="subTitleB"><i class="fa fa-dollar"></i> Precio de Cuota {{ Form::hint( 'Precio de cada cuota' ) }}</h4>

														<div class="form-group">
																<input type="text" name="fee_price" id="fee_price" class="form-control inputMask" value="{{ $edit->fee_price }}" placeholder="Precio" data-inputmask="'mask': '$9{+}[.99]'" tabindex="4" validateMinValue="1///Ingrese un precio mayor a 0">
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

						<button type="button" class="btn btn-green" id="BtnUpdate" tabindex="100"><i class="fa fa-pencil"></i> Editar Precio</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
