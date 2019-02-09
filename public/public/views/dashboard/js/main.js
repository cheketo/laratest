/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		syncStudents();

		syncInscriptions();

		syncMovements();

});


/*
|-------------------------------------------------------------------------------
|	Sync Students
|-------------------------------------------------------------------------------
*/

function syncStudents()
{

		$( "#SyncStudents" ).click( function()
		{

				alertify.confirm( '¿Desea sincronizar los alumnos? El sistema puede demorar varios minutos', function( e )
				{

						if( e )
						{

								var error	= function( response )
								{

										notifyError( 'Hubo un error al intentar sincronizar los alumnos' );

										console.log( response );

										return false;

								}

								var success		= function( response )
								{

										// var info = JSON.parse( response );

										$( '#totalStudents' ).html( response.students );

								}

								submitFields( '/sync/students', success, error );

						}

				});

		});

}

/*
|-------------------------------------------------------------------------------
|	Sync Inscriptions
|-------------------------------------------------------------------------------
*/

function syncInscriptions()
{

		$( "#SyncInscriptions" ).click( function()
		{

				alertify.confirm( '¿Desea sincronizar las inscripciones de los alumnos? El sistema puede demorar varios minutos', function( e )
				{

						if( e )
						{

								var error	= function( response )
								{

										notifyError( 'Hubo un error al intentar sincronizar las inscripciones' );

										console.log( response );

										return false;

								}

								var success		= function( response )
								{

										// var info = JSON.parse( response );

										$( '#totalInscriptions' ).html( response.inscriptions );

								}

								submitFields( '/sync/inscriptions', success, error );

						}

				});

		});

}

/*
|-------------------------------------------------------------------------------
|	Sync Movements
|-------------------------------------------------------------------------------
*/

function syncMovements()
{

		$( "#SyncMovements" ).click( function()
		{

				alertify.confirm( '¿Desea sincronizar los movimientos de los alumnos en Guaraní? El sistema puede demorar varios minutos', function( e )
				{

						if( e )
						{

								var error	= function( response )
								{

										notifyError( 'Hubo un error al intentar sincronizar los movimientos' );

										console.log( response );

										return false;

								}

								var success		= function( response )
								{

										// var info = JSON.parse( response );

										$( '#totalMovements' ).html( response.inscriptions );

								}

								submitFields( '/sync/movements', success, error );

						}

				});

		});

}
