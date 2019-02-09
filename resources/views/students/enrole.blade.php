@extends( 'layouts.private' )

@section( 'tab_title', 'Inscripción a Carreras' )

@section( 'page_title', $student->guarani->nombres . ' ' . $student->guarani->apellido )

@section( 'page_subtitle', 'Inscripción a Carreras' )

@section( 'scripts' )

	{{ HTML::script( '/views/students/js/main.js' ) }}

	{{ HTML::script( '/views/students/js/enrole.js' ) }}

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

														<!-- Career -->
														<h4 class="subTitleB"><i class="fas fa-award"></i> Carreras {{ Form::hint( 'Seleccione la carrera a la que se debe inscribir al alumno.' ) }}</h4>

														<div class="form-group">
																{{ Form::chosen( 'career', $careers, '', [ 'placeholder' => 'Seleccionar Carrera', 'extra' => 'validateEmpty="Seleccione una carrera." tabindex="1"', 'fieldvalue' => 'name' ] ) }}
														</div>

														<div id="prices"></div>


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

						<button type="button" class="btn btn-green" id="BtnEnrole" tabindex="100">Inscribir y continuar <i class="fa fa-arrow-right"></i></button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
