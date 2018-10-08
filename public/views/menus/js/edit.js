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

				askAndSubmit( window.location.pathname, '/menues?msg=update&element=' + $( '#title_menu' ).val(), '¿Desea modificar el menú <b>' + $( '#title_menu' ).val() + '</b>?' );

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
