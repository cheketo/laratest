@extends( 'layouts.public' )

@section( 'scripts' )

		{{ HTML::script( 'views/auth/js/login.js' ) }}

		{{ HTML::script( 'vendor/bootstrap-notify/notify.js' ) }}

@endsection

@section( 'styles' )

	{{ HTML::style( 'views/auth/css/login.css' ) }}

@endsection

@section( 'tab_title', 'Ingresar' )

@section( 'content' )

	<div class="container">
	    <div class="card card-container">
	        <img id="profile-img" class="profile-img-card" src="/images/skin/logouba.png" />
	        <p id="profile-name" class="profile-name-card"></p>
	        <form id="loginForm" name="loginForm" class="form-signin" action="{{ route('login') }}">
							{{ csrf_field() }}
							<div class="input-group">
			            <span class="input-group-addon span-signin no-right-border-radius"><i class="fa fa-user"></i></span>
									<input type="text" validateEmpty="Ingrese su email o usuario" name="login" id="login" class="form-control no-left-border-radius" placeholder="Usuario o Email" autofocus>
							</div>
							<br>
							<div class="input-group">
									<span class="input-group-addon span-signin no-right-border-radius"><i class="fa fa-key"></i></span>
			            <input type="password" validateEmpty="Ingrese su contraseña" name="password" id="password" class="form-control no-left-border-radius" placeholder="Contraseña">
							</div>
							<br>
	        </form><!-- /form -->
					<button id="submitLoginForm" name="submitLoginForm" class="btn btn-lg btn-primary btn-block btn-signin" type="button"><i class="fa fa-sign-in"></i> Ingresar</button>
					<br>



					<div style="width:100%;text-align:center;">
						<a href="#" class="forgot-password">
		            ¿Olvidaste tu clave?
		        </a>
					</div>
	    </div><!-- /card-container -->
	</div><!-- /container -->

@endsection
