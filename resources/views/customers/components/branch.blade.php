<div class="branchWrapper" branch="1">

		<div class="row" style="border-bottom:1px solid #eee;">

				<div class="col-md-4 pad0 showBranchTab" target="branch_information_1" branch="1"><span class="btn btn-flat btn-primary btn-block btn-lg txC cursor-pointer mar0"><i class="fas fa-mail-bulk"></i> Información</span></div>
				<div class="col-md-4 pad0 showBranchTab" target="branch_geolocation_1" branch="1"><span class="btn btn-flat btn-info btn-block btn-lg txC cursor-pointer mar0"><i class="fas fa-map-marker-alt"></i> Geolocalización</span></div>
				<div class="col-md-4 pad0 showBranchTab" target="branch_attention_1" branch="1"><span class="btn btn-flat btn-info btn-block btn-lg txC cursor-pointer mar0"><i class="far fa-clock"></i> Atención</span></div>

		</div>

		@include( 'customers.components.branch_information' )

		@include( 'customers.components.branch_geolocation' )

		@include( 'customers.components.branch_attention' )

</div>
