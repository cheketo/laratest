

<div class="row branchTab" branch="1" id="branch_information_1">

		<div class="col-md-6">

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Nombre de la sucursal', 'bottom', 'fas fa-warehouse' ) }}</span>

						<input type="text" name="branch_name_1" id="branch_name_1" class="form-control no-left-border-radius" placeholder="Nombre Sucursal" tabindex="1" validateEmpty="El nombre es obligatorio.">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Teléfono de la sucursal', 'bottom', 'fas fa-phone-square' ) }}</span>

						<input type="text" name="branch_phone_1" id="branch_phone_1" class="form-control no-left-border-radius" placeholder="Teléfono Sucursal" tabindex="2">

				</div>

		</div>

		<div class="col-md-6">

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Email de la sucursal', 'bottom', 'fas fa-envelope' ) }}</span>

						<input type="text" name="branch_email_1" id="branch_email_1" class="form-control no-left-border-radius" placeholder="Email Sucursal" tabindex="3" validateEmail="Ingrese un email válido">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Sitio web de la sucursal', 'bottom', 'fas fa-globe' ) }}</span>

						<input type="text" name="branch_website_1" id="branch_website_1" class="form-control no-left-border-radius" placeholder="Sitio Web Sucursal" tabindex="4" >

				</div>

		</div>

</div>
