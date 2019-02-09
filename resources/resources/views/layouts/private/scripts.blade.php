
<!-- jQuery -->
{{ HTML::script( 'vendor/jquery/dist/jquery.min.js' ) }}

<!-- jQuery UI -->
{{ HTML::script( 'vendor/jquery-ui/jquery-ui.min.js' ) }}

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge( 'uibutton', $.ui.button );
</script>

<!-- Bootstrap 3.3.7 -->
{{ HTML::script( 'vendor/bootstrap/dist/js/bootstrap.min.js' ) }}

<!-- Slimscroll -->
{{ HTML::script( 'vendor/jquery-slimscroll/jquery.slimscroll.min.js' ) }}

<!-- FastClick -->
{{ HTML::script( 'vendor/fastclick/lib/fastclick.js' ) }}

<!-- AdminLTE App -->
{{ HTML::script( 'template/js/adminlte.js' ) }}

<!-- Bootstrap DatePicker -->
{{ HTML::script( 'vendor/datepicker/bootstrap-datepicker.js' ) }}

<!-- Alertify -->
{{ HTML::script( 'vendor/alertify/alertify.js' ) }}

<!-- Notify -->
{{ HTML::script( 'vendor/notify/notify.js' ) }}

<!-- JQuery AutoComplete -->
{{ HTML::script( 'vendor/autocomplete/jquery.auto-complete.min.js' ) }}

<!-- ChosenJS -->
{{ HTML::script( 'vendor/chosen-js/chosen.jquery.js' ) }}

<!-- Validate -->
{{ HTML::script( 'vendor/validate/validate.js' ) }}

<!-- Loader -->
{{ HTML::script( 'js/loader.js' ) }}

<!-- Common Script -->
{{ HTML::script( 'js/common.js' ) }}

<!-- Scripts -->
@yield( 'scripts' )
