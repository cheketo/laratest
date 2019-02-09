@extends( 'layouts.private' )

@section( 'tab_title', 'Asignar Categoría de Alumno' )

@section( 'page_title', $student->guarani->nombres . ' ' . $student->guarani->apellido )

@section( 'page_subtitle', 'Asignar Categoría de Alumno' )

@section( 'scripts' )

	{{ HTML::script( '/views/students/js/main.js' ) }}

	{{ HTML::script( '/views/students/js/category.js' ) }}

@endsection

@section( 'content' )

		<input type="hidden" id="student_name" name="student_name" value="{{ $student->guarani->nombres . ' ' . $student->guarani->apellido }}">

		<!-- box -->
		<div class="box box-success">

				<!-- .box-body -->
				<div class="box-body">

						<div class="row">

								<div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3">

										<div class="flex-allCenter innerContainer">

												<div class="mw100">


														<!-- Category -->
														<h4 class="subTitleB"><i class="fas fa-list-ol"></i> Categoría de Alumno {{ Form::hint( 'Categoría a la cual pertenece el alumno. Es necesaria para poder inscribirse a las carreras.' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'category', $categories, '', [ 'placeholder' => 'Seleccionar Categoría', 'extra' => 'validateEmpty="La categoría es obligatoria." tabindex="1"', 'fieldvalue' => 'name' ] ) }}
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

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

						<button type="button" class="btn btn-green" id="BtnUpdate" tabindex="100">Continuar con la Inscripción <i class="fa fa-arrow-right"></i></button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
