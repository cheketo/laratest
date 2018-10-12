@extends( 'layouts.private' )

@section( 'tab_title', 'Editar Perfil' )

@section( 'page_title' )

	<i class="fa fa-"></i> Perfil

@endsection

@section( 'page_subtitle', 'Editar' )

@section( 'styles' )

		{{ HTML::style( '/vendor/iCheck/all.css' ) }}

@endsection

@section( 'scripts' )

{{ HTML::script( '/views/routes/js/main.js' ) }}

{{ HTML::script( '/views/routes/js/edit.js' ) }}

{{ HTML::script( '/vendor/iCheck/icheck.min.js' ) }}

{{ HTML::script( '/vendor/inputmask/inputmask.min.js' ) }}

{{ HTML::script( '/vendor/inputmask/jquery.inputmask.min.js' ) }}

@endsection

@section('content')

		<div class="box box-primary">

				<div class="box-body box-profile">

						<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

						<h3 class="profile-username text-center">Nina Mcintire</h3>

						<p class="text-muted text-center">Software Engineer</p>

						<ul class="list-group list-group-unbordered">

								<li class="list-group-item">

										<b>Followers</b> <a class="pull-right">1,322</a>

								</li>

								<li class="list-group-item">

										<b>Following</b> <a class="pull-right">543</a>

								</li>

								<li class="list-group-item">

										<b>Friends</b> <a class="pull-right">13,287</a>

								</li>


						</ul>

						<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>

				</div>
				<!-- /.box-body -->

		</div>

@endsection
