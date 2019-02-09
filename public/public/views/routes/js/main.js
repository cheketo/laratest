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

		changeVerb();

		addMiddlewareButton();

		syncMiddlewares();

		removeMiddlewareRow();

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
|	Show/Hide Fileds
|-------------------------------------------------------------------------------
*/

function toggleViewFields()
{

		$( '#verb' ).change( function()
		{

				changeVerb();

		});

}

/*
|-------------------------------------------------------------------------------
|	Hide View Fileds
|-------------------------------------------------------------------------------
*/

function hideViewFields()
{

		$( '.ViewFields' ).addClass( 'Hidden' );

		$( '#view' ).attr( 'validateEmpty', '' );

}

/*
|-------------------------------------------------------------------------------
|	Hide Other Fileds
|-------------------------------------------------------------------------------
*/

function hideNoViewFields()
{

		$( '.NoViewFields' ).addClass( 'Hidden' );

		$( '#controller' ).attr( 'validateEmpty', '' );

		$( '#method' ).attr( 'validateEmpty', '' );

}

/*
|-------------------------------------------------------------------------------
|	Show View Fileds
|-------------------------------------------------------------------------------
*/

function showViewFields()
{

		$( '.ViewFields' ).removeClass( 'Hidden' );

		$( '#view' ).attr( 'validateEmpty', 'La vista es obligatoria.' );

}

/*
|-------------------------------------------------------------------------------
|	Show Other Fileds
|-------------------------------------------------------------------------------
*/

function showNoViewFields()
{

		$( '.NoViewFields' ).removeClass( 'Hidden' );

		$( '#controller' ).attr( 'validateEmpty', 'El controlador es obligatorio.' );

		$( '#method' ).attr( 'validateEmpty', 'El método es obligatorio' );

}

/*
|-------------------------------------------------------------------------------
|	Change Verb
|-------------------------------------------------------------------------------
*/

function changeVerb()
{

		switch( $( '#verb' ).val().toLowerCase() )
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

}

/*
|-------------------------------------------------------------------------------
|	Add Middleware Button
|-------------------------------------------------------------------------------
*/

function addMiddlewareButton()
{

		$( '#addMiddleware' ).click( function()
		{

				var middleware = $( '#middleware' ).val();

				if( middleware )
				{

						addMiddlewareRow( middleware );

				}else{

						notifyWarning( 'Seleccione un middleware antes de agregarlo.' );

				}

		});

}

/*
|-------------------------------------------------------------------------------
|	Add Middleware Row
|-------------------------------------------------------------------------------
*/

function addMiddlewareRow( middleware )
{

		if( middleware > 0 )
		{

				var data    = { id: middleware };

				var process = '/middleware/get/row';

				$.ajax(
				{

						url: process,

						type: 'POST',

						data: data,

						cache: false,

						async: true,

						success: function( response )
						{

								var table = $( '#tableBody' );

								if( table.children().length > 1 )
								{

										var lastPosition = table.children().last().children( 'td' ).children( 'input' ).val();

								}else{

										var lastPosition = 0;

								}

								table.append( response.contents );

								var row = 	table.children().last();

								row.children( 'td' ).children( 'input' ).val( ( parseInt( lastPosition ) + 1 ) );

								syncMiddlewares();

								removeMiddlewareRow();

								hideLoader();

						},

						error: function( response )
						{

								notifyError( 'Se produjo un error al intentar agregar un middleware' );

								console.log( response );

						}

				});

		}

}


/*
|-------------------------------------------------------------------------------
|	Remove Middleware Row
|-------------------------------------------------------------------------------
*/

function removeMiddlewareRow()
{

		$( '.removeMiddleware' ).click( function( event )
		{

				event.stopPropagation();

				$( this ).parent().parent().remove();

				syncMiddlewares();

		});

}


/*
|-------------------------------------------------------------------------------
|	Sync Middlewares
|-------------------------------------------------------------------------------
*/

function syncMiddlewares()
{

		$( '#middlewareTable' ).addClass( 'Hidden' );

		var middlewares = '';

		$( '.rowMiddleware' ).each( function()
		{

				id = $( this ).attr( 'middleware' );

				if( middlewares == '' )
				{

						middlewares = id;

				}else{

						middlewares = middlewares + ',' + id;

				}

				$( '#middlewareTable' ).removeClass( 'Hidden' );

		});

		$( '#middlewares' ).val( middlewares );

}
