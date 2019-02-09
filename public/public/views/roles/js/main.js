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

				notifySuccess( 'El perfil <b>' + get[ 'element' ] + '</b> ha sido creado correctamente.' );

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

				notifySuccess( 'El perfil <b>' + get[ 'element' ] + '</b> ha sido modificado correctamente.' );

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
