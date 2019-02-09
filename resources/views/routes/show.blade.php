@extends( 'layouts.private' )

@section( 'tab_title', 'Detalles de Ruta' )

@section( 'page_title' )

		<i class="fa fa-map-signs"></i> {{ $show->name }}

@endsection

@section( 'page_subtitle', 'Detalles de Ruta' )

@section( 'styles' )

		{{ HTML::style( '/views/routes/css/show.css' ) }}

@endsection

@section( 'scripts' )

	{{ HTML::script( '/views/routes/js/main.js' ) }}

	{{ HTML::script( '/views/routes/js/show.js' ) }}

@endsection

@section('content')

		<br>

		<div class="box"> <!--box-success-->

		    <div class="box-body">

			      <div class="row main-wrapper profile-section">



								<div class="col-md-7 profile-user-misc">

										<div class="box-body">

												<span class="profile-titles"><strong><i class="fab fa-slack-hash"></i> ID:</strong></span> <span class="badge">{{ $show->id }}</span>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-bookmark"></i> Nombre:</strong></span> <span class="badge bg-blue">{{ $show->name }}</span>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-map-signs"></i> Ruta:</strong></span> <span class="badge bg-aqua">{{ $show->route }}</span>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-key"></i> Acceso:</strong></span> <span class="badge bg-purple">{{ $show->permission }}</span>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-theater-masks"></i> Estado:</strong></span> <span class="badge bg-green">{{ $show->status }}</span>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-history"></i> Última Modificación:</strong></span> <span class="badge bg-brown">{{ $show->updated_at->format( 'd/m/Y | H:i:s' ) }} Hs.</span>

												<hr>

												<span class="profile-titles"><strong><i class="fa fa-clock"></i> Fecha de Creación:</strong></span> <span class="badge bg-navy">{{ $show->created_at->format( 'd/m/Y | H:i:s' ) }} Hs.</span>

												<hr>

										</div>

						</div>

		    </div><!-- /.box-body -->

	  </div>

@endsection
