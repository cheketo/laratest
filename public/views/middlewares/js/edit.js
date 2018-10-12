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

				askAndSubmit( window.location.pathname, '/middlewares?msg=update&element=' + $( '#name' ).val(), '¿Desea modificar el middleware <b>' + $( '#name' ).val() + '</b>?' );

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
