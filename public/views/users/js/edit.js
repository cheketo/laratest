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

				askAndSubmit( window.location.pathname, '/usuarios?msg=update&element=' + $( '#user' ).val(), '¿Desea modificar el usuario <b>' + $( '#user' ).val() + '</b>?' );

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
