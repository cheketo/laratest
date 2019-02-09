@section( 'container' )

		<!-- container-fluid -->
		<div class="container-fluid">

				@if( $results->count() < 1 )

						@include(  $viewPath . '.list.empty' )

				@endif

				<!-- Registers -->
				@php

						$rowColor = ' listRow2 ';

				@endphp

				@foreach( $results as $element )

						@php

								$rowColor = $rowColor == ' listRow2 '? '':' listRow2 ';

						@endphp

						<!-- Row -->
						<div class="row listRow {{$rowColor}} " id="row_{{ $element->id }}">

							@include(  $viewPath . '.list.row' )

								<!-- Detailed Information -->
								<div class="animated DetailedInformation Hidden col-md-12">

										<div class="list-margin-top">

												@include( $viewPath . '.list.additional' )

										</div>

								</div>
								<!-- /Detailed Information -->

								<!-- Row Actions -->
								<div class="listActions flex-justify-center Hidden">

										<div>

												<!-- roundItemActionsGroup -->
												<span class="roundItemActionsGroup">

														@include( $viewPath . '.list.actions' )

												</span>
												<!-- /roundItemActionsGroup -->

										</div>

								</div>
								<!-- /Row Actions -->

						</div>
						<!-- /Row -->



				@endforeach
				<!-- /Registers -->

		</div>
		<!-- container-fluid -->

@endsection
