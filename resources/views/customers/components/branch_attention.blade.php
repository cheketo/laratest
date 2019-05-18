

<div class="row Hidden branchTab" branch="1" id="branch_attention_1">

		<div class="col-md-6">

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Nombre de la sucursal', 'bottom', 'fas fa-bookmark' ) }}</span>

						<input type="text" name="branch_name" id="branch_name" class="form-control no-left-border-radius" placeholder="Nombre Sucursal" tabindex="1" validateEmpty="El nombre es obligatorio.">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'País dónde se encuentra la sucursal', 'bottom', 'fas fa-globe-americas' ) }}</span>

						<input type="text" name="branch_country" id="branch_country" class="form-control no-left-border-radius" placeholder="País de Sucursal" tabindex="2">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Provincia o estado dónde se encuentra la sucursal', 'bottom', 'fas fa-tree' ) }}</span>

						<input type="text" name="branch_province" id="branch_province" class="form-control no-left-border-radius" placeholder="Provincia de Sucursal" tabindex="3">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Ciudad dónde se encuentra la sucursal', 'bottom', 'fas fa-city' ) }}</span>

						<input type="text" name="branch_city" id="branch_city" class="form-control no-left-border-radius" placeholder="Ciudad de Sucursal" tabindex="4">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Dirección completa de la sucursal (calle y número)', 'bottom', 'fas fa-road' ) }}</span>

						<input type="text" name="branch_address" id="branch_address" class="form-control no-left-border-radius" placeholder="Dirección de Sucursal" tabindex="5">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Piso del edificio en el que se encuentra la sucursal (número de piso)', 'bottom', 'fas fa-building' ) }}</span>

						<input type="text" name="branch_floor" id="branch_floor" class="form-control no-left-border-radius" placeholder="Piso de Sucursal" tabindex="6">

				</div>

				<div class="input-group margin-top-10">

						<span class="input-group-addon span-signin no-right-border-radius">{{ Form::hint( 'Departamento o sección dónde se enuentra la sucursal (n)', 'bottom', 'fas fa-door-closed' ) }}</span>

						<input type="text" name="branch_apartment" id="branch_apartment" class="form-control no-left-border-radius" placeholder="Departamento de Sucursal" tabindex="7">

				</div>

		</div>

		<div class="col-md-6">

		</div>

</div>
