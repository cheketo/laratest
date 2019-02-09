@extends( 'layouts.private' )

@section( 'tab_title', 'Inicio' )

@section( 'page_title', 'Inicio' )

@section( 'scripts' )

		{{ HTML::script( '/views/dashboard/js/main.js' ) }}

@endsection

@section( 'content' )

		<input type="hidden" id="none" name="none" value="">

		<div class="row">

				<div class="col-lg-3 col-xs-6">

						<div class="small-box bg-aqua">

								<div class="inner">

										<h3 id="totalStudents"></h3>

										<p>Alumnos Nuevos</p>

								</div>

								<div class="icon">

										<i class="fa fa-user-graduate"></i></a>

								</div>

								<span class="small-box-footer cursor-pointer" id="SyncStudents">Actualizar <i class="fa fa-refresh"></i></span>

						</div>

				</div>

				<div class="col-lg-3 col-xs-6">

						<div class="small-box bg-blue">

								<div class="inner">

										<h3 id="totalInscriptions"></h3>

										<p>Inscripciones Nuevas</p>

								</div>

								<div class="icon">

										<i class="fas fa-clipboard-list"></i>

								</div>

								<span class="small-box-footer cursor-pointer" id="SyncInscriptions">Actualizar <i class="fa fa-refresh"></i></span>

						</div>

				</div>

				<div class="col-lg-3 col-xs-6">

						<div class="small-box bg-green">

								<div class="inner">

										<h3 id="totalMovements"></h3>

										<p>Movimientos Importados</p>

								</div>

								<div class="icon">

										<i class="fa fa-dollar"></i></a>

								</div>

								<span class="small-box-footer cursor-pointer" id="SyncMovements">Actualizar <i class="fa fa-refresh"></i></span>

						</div>

				</div>

				<!-- <div class="col-lg-3 col-xs-6">
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3>44</h3>

							<p>User Registrations</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>65</h3>

						<p>Unique Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div> -->

		</div>


@endsection
