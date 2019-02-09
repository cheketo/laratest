/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		create();

		createNext();

		keyPressCreate();

});


/*
|-------------------------------------------------------------------------------
|	Create
|-------------------------------------------------------------------------------
*/

function create()
{

		$( "#BtnCreate" ).click( function()
		{

				askAndSubmit( window.location.pathname, '/rutas?msg=insert&element=' + $( '#name' ).val(), '¿Desea crear la ruta <b>' + $( '#name' ).val() + '</b>?' );

		});

}


/*
|-------------------------------------------------------------------------------
|	Create Next
|-------------------------------------------------------------------------------
*/

function createNext()
{

		$( "#BtnCreateNext" ).click( function()
		{

				askAndSubmit( window.location.pathname, '/rutas/crear?msg=insert&element=' + $( '#name' ).val(), '¿Desea crear la ruta <b>' + $( '#name' ).val() + '</b>?' );

		});

}


/*
|-------------------------------------------------------------------------------
|	Key Press Create
|-------------------------------------------------------------------------------
*/

function keyPressCreate()
{

		$( "input" ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( "#BtnCreate" ).click();

				}

		});

}
