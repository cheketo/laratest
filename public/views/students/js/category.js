/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		update();

		keyPressUpdate();

});


/*
|-------------------------------------------------------------------------------
|	Update
|-------------------------------------------------------------------------------
*/

function update()
{

		$( "#BtnUpdate" ).click( function()
		{

				var url = window.location.pathname.split( '/' ).reverse();

				askAndSubmit( window.location.pathname, '/alumnos/inscripcion/' + url[ 0 ] + '?msg=category&element=' + $( "#category option[value='" + $( '#category' ).val() + "']" ).html(), '¿Desea asignar la categoría <b>' + $( "#category option[value='" + $( '#category' ).val() + "']" ).html() + '</b> al alumno <b>' + $( '#student_name' ).val() + '</b>?' );

		});

}


/*
|-------------------------------------------------------------------------------
|	Key Press Update
|-------------------------------------------------------------------------------
*/

function keyPressUpdate()
{

		$( "input" ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( "#BtnUpdate" ).click();

				}

		});

}
