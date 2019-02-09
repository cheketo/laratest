@extends( 'layouts.private' )

@section( 'tab_title', 'Editar Grupo de Carreras' )

@section( 'page_title' )

	<i class="fa fa-pencil-square"></i> Grupo de Carreras

@endsection

@section( 'page_subtitle', 'Editar' )

@section( 'scripts' )

	{{ HTML::script( '/views/careers/groups/js/main.js' ) }}
	{{ HTML::script( '/views/careers/groups/js/edit.js' ) }}

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

														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> Nombre {{ Form::hint( 'Nombre que tendrá el grupo' ) }}</h4>

														<div class="form-group">
																<input type="text" name="name" id="name" class="form-control" value="{{ $edit->name }}" placeholder="Nombre del Grupo" tabindex="1" validateEmpty="El nombre es obligatorio." validateFromFile="/career/group/validate/name///El nombre ya existe///actualvalue:={{ $edit->name }}">
														</div>

														<h4 class="subTitleB"><i class="fa fa-list-alt"></i> Descripción {{ Form::hint( 'Descripción que explica que tipo de carreras agrupa' ) }}</h4>

														<div class="form-group">
																<textarea name="description" id="description" class="form-control" placeholder="Descripción del Grupo" tabindex="2" validateEmpty="La descripción es obligatoria." rows="8" cols="80">{{ $edit->description }}</textarea>
														</div>

														<h4 class="subTitleB"><i class="fas fa-award"></i> Carreras {{ Form::hint( 'Carreras que quedarán relacionadas con el grupo' ) }}</h4>

														<div class="form-group">
																{{ Form::multiple( 'careers', App\Models\Career::groupIsNullOr( $edit->id )->status( 'A' )->get(), $edit->careers, [ 'placeholder' => 'Seleccione las carreras', 'extra' => 'validateEmpty="Seleccione al menos una carrera" tabindex="3"', 'fieldvalue' => 'short_name' ] ) }}
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

						<button type="button" class="btn btn-green" id="BtnUpdate" tabindex="100"><i class="fa fa-pencil"></i> Editar Grupo</button>

						<button type="button" class="btn btn-red BtnCancel" tabindex="102"><i class="fa fa-times"></i> Cancelar</button>

				</div>
				<!-- /box-footer -->

		</div>
		<!-- /box -->

@endsection
