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

		toggleRouteFields();

		$( '#route' ).change();

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

				notifySuccess( 'El menú <b>' + get[ 'element' ] + '</b> ha sido creado correctamente.' );

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

				notifySuccess( 'El menú <b>' + get[ 'element' ] + '</b> ha sido modificado correctamente.' );

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
|	Toggle Route Fields
|-------------------------------------------------------------------------------
*/

function toggleRouteFields()
{

		$( '#route' ).on( 'change', function()
		{

				if( $( this ).val() > 0 )
				{

						$( '.RouteField' ).removeClass( 'Hidden' );

				}else{

						$( '.RouteField' ).addClass( 'Hidden' );

						$( '#title_page' ).val( '' );

						$( '#title_tab' ).val( '' );

				}

		});


}
