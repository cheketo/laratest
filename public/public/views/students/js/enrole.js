/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		enrole();

		keyPressEnrole();

		careerChanged();

});

/*
|-------------------------------------------------------------------------------
|	Career Changed
|-------------------------------------------------------------------------------
*/

function careerChanged()
{

		$( '#career' ).on( 'change', function()
		{

				var career = $( this ).val();

				var url = window.location.pathname.split( '/' ).reverse();

				var student = url[ 0 ];

				$.ajax(
				{

						url: '/student/get/prices',

						type: 'POST',

						data: { student: student, career: career },

						cache: false,

						async: true,

						success: function( response )
						{

								var wrapper = $( '#prices' );

								wrapper.html( response.content );

								hideLoader();

						},

						error: function( response )
						{

								notifyError( 'Se produjo un error al buscar los aranceles de la carrera' );

								console.log( response );

						}

				});

		});

}

/*
|-------------------------------------------------------------------------------
|	Enrole
|-------------------------------------------------------------------------------
*/

function enrole()
{

		$( "#BtnEnrole" ).click( function()
		{

				var url = window.location.pathname.split( '/' ).reverse();

				askAndSubmit( window.location.pathname, '/alumnos/cuentacorriente/' + url[ 0 ] + '?msg=enrole&element=' + $( "#career option[value='" + $( '#career' ).val() + "']" ).html(), '¿Desea inscribir al alumno <b>' + $( '#student_name' ).val() + '</b> en la carrera <b>' + $( "#career option[value='" + $( '#career' ).val() + "']" ).html() + '</b>?' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Key Press Update
|-------------------------------------------------------------------------------
*/

function keyPressEnrole()
{

		$( "input" ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( "#BtnEnrole" ).click();

				}

		});

}
