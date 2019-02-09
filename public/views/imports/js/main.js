/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		makeImport();

});


/*
|-------------------------------------------------------------------------------
|	Sync Students
|-------------------------------------------------------------------------------
*/

function makeImport()
{

		$( "#makeImport" ).click( function()
		{

				alertify.confirm( '¿Desea importar datos desde el sistema Guaraní?<br>Esto puede demorar varios minutos', function( e )
				{

						if( e )
						{

								var error	= function( response )
								{

										notifyError( 'Hubo un error durante la importación' );

										console.log( response );

										return false;

								}

								var success		= function( response )
								{

										// var info = JSON.parse( response );

										window.location = window.location.pathname;

								}

								submitFields( '/importaciones/crear', success, error );

						}

				});

		});

}
