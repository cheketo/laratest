<br>

<div class="row">

		<div class="col-sm-12 col-md-6 col-md-offset-3">

				<!-- <div class="window Hidden" id="change_password_window"> -->
				<div class="panel panel-primary Hidden" id="change_password_window">

						<div class="panel-heading">
								<h4><strong>Cambiar Contraseña</strong></h4>
						</div>

						<div class="window-body" style="background:#FFF;">



												<div class="flex-allCenter innerContainer">

														<div class="mw100">

																<h4 class="subTitleB"><i class="fa fa-key"></i> Antigua Contraseña</h4>

																<div class="form-group">

																		<input type="password" id="password_old" name="password_old" class="form-control" placeholder="Antigua Contraseña" value="" tabindex="1" validateEmpty="Ingrese su antigua contraseña.">

																</div>

																<h4 class="subTitleB"><i class="fa fa-key"></i> Nueva Contraseña</h4>

																<div class="form-group">

																		<input type="password" id="password" name="password" class="form-control" placeholder="Nueva Contraseña" value="" tabindex="2" validateEmpty="Ingrese su nueva contraseña." validateMinLength="4///La nueva contraseña debe contener 4 caracteres como mínimo">

																</div>

																<h4 class="subTitleB"><i class="fa fa-check"></i> Confirmar Contraseña</h4>

																<div class="form-group">

																		<input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirmar Contraseña" value="" tabindex="3" validateEmpty="Reingrese su nueva contraseña." validateEqualToField="password///Las contraseñas deben coincidir.">

																</div>

														</div>

												</div>

										</div>

						<div class="panel-footer txC">

								<button type="button" class="btn btn-success" name="changePassword" id="changePassword"><i class="fa fa-check-circle"></i> Confirmar Cambio</button>

								<button type="button" class="btn btn-danger" name="cancelPassword" id="cancelPassword"><i class="fa fa-times-circle"></i> Cancelar</button>

						</div>

				</div>

		</div>

</div>
