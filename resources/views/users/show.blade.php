@extends( 'layouts.private' )

@section( 'tab_title', 'Detalles de Usuario' )

@section( 'page_title' )

		<i class="fa fa-address-card"></i> {{ $show->first_name }} {{ $show->last_name }} ({{ $show->user }})

@endsection

@section( 'page_subtitle', 'Detalles de Usuario' )

@section( 'styles' )

		{{ HTML::style( '/views/users/css/show.css' ) }}

@endsection

@section( 'scripts' )

	{{ HTML::script( '/views/users/js/main.js' ) }}

	{{ HTML::script( '/views/users/js/show.js' ) }}

@endsection

@section('content')

		<br>

		<div class="box"> <!--box-success-->

		    <div class="box-body">

			      <div class="row main-wrapper profile-section">

				    		<div class="col-md-5 profile-user-info">

										<div style="margin-top:50px;" class="">

						            <img class="profile-img img-responsive" src="{{ $show->image->route }}">

						            <h3 class="profile-username text-center">{{ $show->first_name }} {{ $show->last_name }}</h3>

						            <p class="text-muted text-center">{{ $show->user }}</p>

					          </div>

								</div>

								<div class="col-md-7 profile-user-misc">

										<div class="box-body">

												<span class="profile-titles"><strong><i class="fa fa-bookmark"></i> Nombre y Apellido</strong></span>

												<p>

														<span class="badge bg-blue">{{ $show->first_name }} {{ $show->last_name }}</span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-envelope"></i> Email</strong></span>

												<p>

														<span class="badge bg-aqua">{{ $show->email }}</span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-user"></i> Usuario</strong></span>

												<p>

														<span class="badge bg-green">{{ $show->user }}</span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-lock"></i> Perfiles</strong></span>

												<p>

														@foreach( $show->roles as $role )

																<span class="badge bg-purple">{{ $role->name }}</span>

														@endforeach

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-history"></i> Última Conexión</strong></span>

												<p>

														<span class="badge bg-brown">{{ $show->updated_at->format( 'd/m/Y | H:i:s' ) }} Hs.<!--12/10/18|19:52:52Hs.--></span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-clock"></i> Fecha de Creación</strong></span>

												<p>

														<span class="badge bg-navy">{{ $show->created_at->format( 'd/m/Y | H:i:s' ) }} Hs.</span>

												</p>

												<hr>

										</div>

								</div>

						</div>

		    </div><!-- /.box-body -->

	  </div>

@endsection
