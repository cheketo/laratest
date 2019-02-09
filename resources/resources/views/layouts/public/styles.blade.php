<!-- Font Awesome -->
{{ HTML::style( 'https://use.fontawesome.com/releases/v5.2.0/css/all.css' ) }}

{{ HTML::style( 'https://use.fontawesome.com/releases/v5.2.0/css/v4-shims.css' ) }}

<!-- Template style -->
{{ HTML::style('template/css/AdminLTE.min.css') }}

<!-- AdminLTE Skin -->
{{ HTML::style('template/css/skins/_all-skins.min.css') }}

<!-- Google Font -->
{{ HTML::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}

<!-- Custom css -->
{{ HTML::style( 'css/app.css' ) }}

<!-- Validate -->
{{ HTML::style('vendor/validate/validate.css') }}

<!-- Loader -->
{{ HTML::style( 'css/loader.css' ) }}

<!-- Public css -->
{{ HTML::style('css/public.css') }}

@yield( 'styles' )
