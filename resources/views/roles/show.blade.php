@extends( 'layouts.private' )

@section( 'tab_title', 'Detalles de Perfil' )

@section( 'page_title' )

		<i class="fa fa-key"></i> {{ $show->name }}

@endsection

@section( 'page_subtitle', 'Detalles de Perfil' )

@section( 'styles' )

		{{ HTML::style( '/views/roles/css/show.css' ) }}

@endsection

@section( 'scripts' )

	{{ HTML::script( '/views/roles/js/main.js' ) }}

	{{ HTML::script( '/views/roles/js/show.js' ) }}

@endsection

@section('content')

		<br>

		<div class="box"> <!--box-success-->

		    <div class="box-body">

			      <div class="row main-wrapper profile-section">



								<div class="col-md-7 profile-user-misc">

										<div class="box-body">

												<span class="profile-titles"><strong><i class="fa fa-bookmark"></i> Nombre</strong></span>

												<p>

														<span class="badge bg-blue">{{ $show->name }}</span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-list-alt"></i> Descripción</strong></span>

												<p>

														<span class="badge bg-aqua">{{ $show->description }}</span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-map-signs"></i> Rutas</strong></span>

												<p>

														@foreach( $show->routes as $route )

														<span class="badge bg-purple">{{ $route->name }}</span>

														@endforeach


												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-history"></i> Última Modificación</strong></span>

												<p>

														<span class="badge bg-brown">{{ $show->updated_at->format( 'd/m/Y | H:i:s' ) }} Hs.</span>

												</p>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-clock"></i> Fecha de Creación</strong></span>

												<p>

														<span class="badge bg-navy">{{ $show->created_at->format( 'd/m/Y | H:i:s' ) }} Hs.</span>

												</p>

												<hr>

										</div>

						</div>

		    </div><!-- /.box-body -->

	  </div>

@endsection
