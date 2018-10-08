/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		createNotify();

		updateNotify();

		keyPress();

		toggleViewFields();

		$( '#verb' ).change();

});


/*
|-------------------------------------------------------------------------------
|	Create Notify
|-------------------------------------------------------------------------------
*/

function createNotify()
{

		if( get[ 'msg' ] == 'insert' )
		{

				notifySuccess( 'La ruta <b>' + get[ 'element' ] + '</b> ha sido creado correctamente.' );

		}

}


/*
|-------------------------------------------------------------------------------
|	Update Notify
|-------------------------------------------------------------------------------
*/

function updateNotify()
{

		if( get[ 'msg' ] == 'update' )
		{

				notifySuccess( 'La ruta <b>' + get[ 'element' ] + '</b> ha sido modificada correctamente.' );

		}

}

/*
|-------------------------------------------------------------------------------
|	Key Press
|-------------------------------------------------------------------------------
*/


function keyPress()
{

		$( 'button' ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( this ).click();

				}

		});

}

/*
|-------------------------------------------------------------------------------
|	Show/Hide View Fileds
|-------------------------------------------------------------------------------
*/

function toggleViewFields()
{

		$( '#verb' ).change( function()
		{

				switch( $( this ).val().toLowerCase() )
				{

						case '':

								hideViewFields();

								hideNoViewFields();

						break;

						case 'view':

								showViewFields();

								hideNoViewFields();

						break;

						default:

								hideViewFields();

								showNoViewFields();

						break;

				}

		});

}

function hideViewFields()
{

		$( '.ViewFields' ).addClass( 'Hidden' );

		$( '#view' ).attr( 'validateEmpty', '' );

}

function hideNoViewFields()
{

		$( '.NoViewFields' ).addClass( 'Hidden' );

		$( '#controller' ).attr( 'validateEmpty', '' );

		$( '#method' ).attr( 'validateEmpty', '' );

}

function showViewFields()
{

		$( '.ViewFields' ).removeClass( 'Hidden' );

		$( '#view' ).attr( 'validateEmpty', 'La vista es obligatoria.' );

}

function showNoViewFields()
{

		$( '.NoViewFields' ).removeClass( 'Hidden' );

		$( '#controller' ).attr( 'validateEmpty', 'El controlador es obligatorio.' );

		$( '#method' ).attr( 'validateEmpty', 'El método es obligatorio' );

}
