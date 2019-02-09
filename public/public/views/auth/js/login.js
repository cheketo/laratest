$(function()
{

	/* Submit on click
	 * ===============
	 * Triggers an Ajax to submit login form.
	 *
	 */

		var button 	= $( '#submitLoginForm' );

		var form 		= $( '#loginForm' );

		button.unbind( 'click' );

		button.on( 'click', function()
		{

				if( validate.validateFields( 'loginForm' ) )
				{

						formData = form.serialize();

				    $.ajax(
						{

				        url: form.attr( 'action' ),

				        type: 'POST',

				        data: formData,

								async: false,

				        success: function( data )
								{

										if( data.redirect )

												window.location = data.redirect;

										else

												notifyError( 'Compruebe su usuario y contraseña.' );

				        },

				    		error: function( data )
								{

										notifyError( 'Hubo un error. Recargue la página y compruebe nuevamente.' );

				            console.log( data );

				        }

				    });

				}

		});


		/* Submit when press enter key
		 * ===========================
		 * Emulates a click event when enter key is pressed.
		 *
		 */

		$( 'input' ).unbind( 'keypress' );

		$( 'input' ).keypress( function( e )
		{

				if( e.which == 10 || e.which == 13 )
				{

						button.click();

				}

		});

});
