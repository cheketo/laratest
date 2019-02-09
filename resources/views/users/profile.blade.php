	@extends( 'layouts.private' )

	@section( 'tab_title', 'Mi Perfil' )

	@section( 'page_title' )

			<i class="fa fa-address-card"></i> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} ({{ auth()->user()->user }})

	@endsection

	@section( 'page_subtitle', 'Mi Perfil' )

	@section( 'styles' )

			{{ HTML::style( '/views/users/css/show.css' ) }}

			{{ HTML::style( '/css/window.css' ) }}

	@endsection

	@section( 'scripts' )

		{{ HTML::script( '/views/users/js/main.js' ) }}

		{{ HTML::script( '/views/users/js/profile.js' ) }}

	@endsection

	@section('content')

			@include( 'users.profile.color' )

			@include( 'users.profile.password' )

			<div class="box" id="main-box"> <!--box-success-->

			    <div class="box-body">

				      <div class="row main-wrapper profile-section">

					    		<div class="col-md-5 profile-user-info txC">

											<div style="margin-top:50px;" class="">

							            <img class="profile-img img-responsive" src="{{ auth()->user()->image->route }}">

							            <h3 class="profile-username text-center">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h3>

							            <p class="text-muted text-center">{{ auth()->user()->user }}</p>

						          </div>

											<hr>

											@if( auth()->user()->hasRoute( 'user_change_password' ) )

											<button type="button" id="change_password" name="change_password" class="btn btn-primary"><i class="fa fa-key"></i> Cambiar mi Contraseña</button>

											@endif

											<button type="button" id="change_background" name="change_background" class="btn bg-maroon"><i class="fa fa-magic"></i> Cambiar el color del administrador</button>

									</div>

									<div class="col-md-7 profile-user-misc">

											<div class="box-body">

													<span class="profile-titles"><strong><i class="fa fa-bookmark"></i> Nombre y Apellido</strong></span>

													<p>

															<span class="badge bg-blue">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>

													</p>

													<hr>

													<span class="profile-titles"><strong><i class="fa fa-envelope"></i> Email</strong></span>

													<p>

															<span class="badge bg-aqua">{{ auth()->user()->email }}</span>

													</p>

													<hr>

													<span class="profile-titles"><strong><i class="fa fa-user"></i> Usuario</strong></span>

													<p>

															<span class="badge bg-green">{{ auth()->user()->user }}</span>

													</p>

													<hr>

													<span class="profile-titles"><strong><i class="fa fa-lock"></i> Perfiles</strong></span>

													<p>

															@foreach( auth()->user()->roles as $role )

																	<span class="badge bg-purple">{{ $role->name }}</span>

															@endforeach

													</p>

													<hr>

													<span class="profile-titles"><strong><i class="fa fa-history"></i> Última Conexión</strong></span>

													<p>

															<span class="badge bg-brown">{{ auth()->user()->updated_at->format( 'd/m/Y | H:i:s' ) }} Hs.<!--12/10/18|19:52:52Hs.--></span>

													</p>

													<hr>

													<span class="profile-titles"><strong><i class="fa fa-clock"></i> Fecha de Creación</strong></span>

													<p>

															<span class="badge bg-navy">{{ auth()->user()->created_at->format( 'd/m/Y | H:i:s' ) }} Hs.</span>

													</p>

													<hr>

											</div>

									</div>

							</div>

			    </div><!-- /.box-body -->

		  </div>

	@endsection
