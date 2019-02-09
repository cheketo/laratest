<tr class="rowMiddleware" middleware="{{ $middleware->id }}">

		<td class="txC">

				<input type="text" id="middleware_position_{{ $middleware->id }}" name="middleware_{{ $middleware->id }}" data-inputmask="'mask': '9{+}'" value="@if( $middleware->pivot ) {{ $middleware->pivot->position }} @else  -1 @endif" style="width:40px" class="txC inputMask form-control">

		</td>

		<td class="txC"><span class="badge bg-purple">{{ $middleware->name }}</span></td>

		<td>
				@if( $middleware->description )

						{{ $middleware->description }}

				@else

						-- Sin Descripción --

				@endif
		</td>

		<td class="txC"><span middleware="{{ $middleware->id }}" class="removeMiddleware text-red hint--error hint--bottom-right hint--bounce" aria-label="Quitar"><i class="fa fa-minus-circle" style="cursor:pointer;"></i></span></td>

</tr>
