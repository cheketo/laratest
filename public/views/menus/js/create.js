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

				askAndSubmit( window.location.pathname, '/menues?msg=insert&element=' + $( '#title_menu' ).val(), '¿Desea crear el menú <b>' + $( '#title_menu' ).val() + '</b>?' );

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

				askAndSubmit( window.location.pathname, '/menues/crear?msg=insert&element=' + $( '#title_menu' ).val(), '¿Desea crear el menú <b>' + $( '#title_menu' ).val() + '</b>?' );

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
