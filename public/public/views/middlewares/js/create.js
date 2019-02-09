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

				askAndSubmit( window.location.pathname, '/middlewares?msg=insert&element=' + $( '#name' ).val(), '¿Desea crear el middleware <b>' + $( '#name' ).val() + '</b>?' );

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

				askAndSubmit( window.location.pathname, '/middlewares/crear?msg=insert&element=' + $( '#name' ).val(), '¿Desea crear el middleware <b>' + $( '#name' ).val() + '</b>?' );

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
