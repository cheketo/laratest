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

	{{ HTML::script( '/views/roles/js/main.js' ) }}

	{{ HTML::script( '/views/roles/js/create.js' ) }}

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

														<h4 class="subTitleB"><i class="fa fa-bookmark"></i> Nombre {{ Form::hint( 'Nombre que tendrá el perfil' ) }}</h4>

														<div class="form-group">
																<input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Perfil" tabindex="1" validateEmpty="El nombre es obligatorio.">
														</div>

														<h4 class="subTitleB"><i class="fa fa-list-alt"></i> Descripción {{ Form::hint( 'Descripción que explica que permisos otorga y a que tipo de usuario está dirigido' ) }}</h4>

														<div class="form-group">
																<textarea name="description" id="description" class="form-control" placeholder="Descripción del Perfil" tabindex="2" validateEmpty="El nombre es obligatorio." rows="8" cols="80"></textarea>
														</div>

														<h4 class="subTitleB"><i class="fa fa-key"></i> Permisos {{ Form::hint( 'Permisos que otorga este perfil' ) }}</h4>

																@php

																		$bgClass = '';

																@endphp

																@foreach( App\Models\WebRoute::all() as $route )

																		@if( $route->status == 'A' )

																				@php

																						$bgClass = $bgClass == '' ? 'bg-gray-light' : '';

																				@endphp

																				<div class="innerContainer {{ $bgClass }}" style="padding-top:10px;">

																						{{ Form::icheckbox( 'route', $route->id, false, [ 'color' => '', 'shape' => 'flat' ] ) }} <strong> {{ $route->name }} </strong> ( <span class="text-blue"> {{ $route->route }} </span> )

																				</div>

																		@endif

																@endforeach


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
