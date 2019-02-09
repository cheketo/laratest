/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		showBackgroundColorWindow();

		changeBackgroundColor();

		showPasswordWindow();

		hidePasswordWindow();

		changePassword();

});

/*
|-------------------------------------------------------------------------------
|	Show Background Color Window
|-------------------------------------------------------------------------------
*/
function showBackgroundColorWindow()
{

		$( '#change_background' ).click( function()
		{

				$( '#change_brackground_color' ).removeClass( 'Hidden' );
				$( '#main-box' ).addClass( 'Hidden' );

		});

}


/*
|-------------------------------------------------------------------------------
|	Change Background Color
|-------------------------------------------------------------------------------
*/
function changeBackgroundColor()
{

		$( 'a[href="javascript:void(0)"]' ).click( function()
		{

				var skin = $( this ).attr( 'data-skin' );

				updateBackgroundColor( skin );

				$( '#change_brackground_color' ).addClass( 'Hidden' );
				$( '#main-box' ).removeClass( 'Hidden' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Change Skin
|-------------------------------------------------------------------------------
*/
function changeSkin( skin )
{

		$( 'body' ).removeClass( function ( index, className )
		{
				return ( className.match (/(^|\s)skin-\S+/g) || []).join(' ');

		});

		$( 'body' ).addClass( skin );

}

/*
|-------------------------------------------------------------------------------
|	Change Background Color
|-------------------------------------------------------------------------------
*/
function updateBackgroundColor( skin )
{
		var process = '/user/change/color/' + skin;

		var result;

		$.ajax(
		{

				type: 'POST',

				url: process,

				cache: false,

				async: false,

				success: function( response )
				{

						if( response.valid == true )
						{

								changeSkin( skin );

								result = true;

						}else{

								console.log( response );

								notifyError( 'Ha ocurrido un error. No es posible cambiar el color del administrador.' );

						}

				},

				error: function( response )
				{

						console.log( response )

						notifyError( 'Ha ocurrido un error. No es posible cambiar el color del administrador.' );

				}

		});

}

/*
|-------------------------------------------------------------------------------
|	Show Password Window
|-------------------------------------------------------------------------------
*/

function showPasswordWindow()
{

		$( '#change_password' ).click( function()
		{

				$( '#change_password_window' ).removeClass( 'Hidden' );
				$( '#main-box' ).addClass( 'Hidden' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Hide Password Window
|-------------------------------------------------------------------------------
*/

function hidePasswordWindow()
{

		$( '#cancelPassword' ).click( function()
		{

				$( '#change_password_window' ).addClass( 'Hidden' );
				$( '#main-box' ).removeClass( 'Hidden' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Change Password
|-------------------------------------------------------------------------------
*/

function changePassword()
{

		$( '#changePassword' ).click( function()
		{

				if( validate.validateFields( '*' ) )
				{

						alertify.confirm( '¿Desea cambiar su contraseña?', function( e )
						{

								if( e )
								{

										var error	= function( response )
										{

												console.log( response.valid );

												notifyError( 'Ha ocurrido un error al intentar cambiar la contraseña.' );

												console.log( response );

										}

										var success		= function( response )
										{

												console.log( response );

												notifySuccess( 'La contraseña ha sido modificada correctamente.' );

												$( '#cancelPassword' ).click();

										}

										submitFields( '/user/change/password', success, error );

								}

						});

				}

		});

}
