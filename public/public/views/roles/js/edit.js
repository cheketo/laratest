/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		update();

		keyPressUpdate();

});


/*
|-------------------------------------------------------------------------------
|	Update
|-------------------------------------------------------------------------------
*/

function update()
{

		$( "#BtnUpdate" ).click( function()
		{

				askAndSubmit( window.location.pathname, '/perfiles?msg=update&element=' + $( '#name' ).val(), '¿Desea modificar el perfil <b>' + $( '#name' ).val() + '</b>?' );

		});

}


/*
|-------------------------------------------------------------------------------
|	Key Press Update
|-------------------------------------------------------------------------------
*/

function keyPressUpdate()
{

		$( "input" ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( "#BtnUpdate" ).click();

				}

		});

}
