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

				askAndSubmit( '/usuarios/crear', '/usuarios?msg=insert&element=' + $( '#user' ).val(), '¿Desea crear el usuario <b>' + $( '#user' ).val() + '</b>?' );

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

				askAndSubmit( '/usuarios/crear', '/usuarios/crear', '¿Desea crear el usuario <b>' + $( '#user' ).val() + '</b>?' );

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
