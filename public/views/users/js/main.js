/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		createNotify();

		updateNotify();

		uploadImage();

		selectImg();

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

				notifySuccess( 'El usuario <b>' + get[ 'element' ] + '</b> ha sido creado correctamente.' );

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

				notifySuccess( 'El usuario <b>' + get[ 'element' ] + '</b> ha sido modificado correctamente.' );

		}

}


/*
|-------------------------------------------------------------------------------
|	Upload Image
|-------------------------------------------------------------------------------
*/

function uploadImage()
{

		$( "#image" ).change( function()
		{

				var route		= '/user/upload/image';

				var success		= function( response )
				{

						$( '#newimage' ).val( response.id );

						$( ".MainImg" ).attr( "src", response.route );

						$( '.MainImg' ).addClass( 'pulse' ).one( 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function()
						{

								$( this ).removeClass( 'pulse' );

						});

						// $( '#UserImages' ).append( '<li><img src="' + returningData + '" class="ImgSelecteable"></li>' );

						selectImg();

				}

				var error	= function( response )
				{

						notifyError( 'Se ha producido un error al intentar subir la imagen.' );

						console.log( response.responseText );

				}

				submitFields( route, success, error );

		});

		$( '.imgSelectorContent' ).click( function()
		{

				$( "#image" ).click();

		});

}


/*
|-------------------------------------------------------------------------------
|	Select Image
|-------------------------------------------------------------------------------
*/

function selectImg()
{

		$( ".ImgSelecteable" ).click( function()
		{

				var src = $( this ).attr( "src" );

				$( ".MainImg" ).attr( "src", src );

				$( '.MainImg' ).addClass( 'pulse' ).one( 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function()
				{

	      		$( this ).removeClass( 'pulse' );

	    	});

					$( "#newimage" ).val( src );

		});

}


/*
|-------------------------------------------------------------------------------
|	Key Press
|-------------------------------------------------------------------------------
*/

function keyPress()
{

		$( "button, .ImgSelecteable" ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( this ).click();

				}

		});

		$( ".imgSelectorInner" ).keypress( function( e )
		{

				if( e.which == 13 )
				{

						$( ".imgSelectorContent" ).click();

				}

		});

}
