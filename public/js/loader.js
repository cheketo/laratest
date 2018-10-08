/*
|-------------------------------------------------------------------------------
| Ajax Loader Functions
|-------------------------------------------------------------------------------
| Configure and shows a loader when an Ajax call is executing.
|
*/

$( document ).ready( function()
{
		$.ajaxSetup(
		{

				headers: {

						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )

				}

		});

});



$( document ).ajaxStart( function()
{

    $( "#CloseAjaxLoader" ).addClass( 'Hidden' );

    showLoader();

});

$( document ).ajaxComplete( function()
{

    chosenSelect();

    inputMask();

    hideLoader();


});

function toggleLoader()
{

		if( $( ".loader" ).hasClass( 'Hidden' ) )
		{

				showLoader();

		}else{

				hideLoader();

		}

}

function showLoader()
{

		$( '.loader' ).removeClass( 'Hidden' );

  	$( "#CloseAjaxLoader" ).addClass( 'Hidden' );

  	setTimeout( function()
		{

    		$( "#CloseAjaxLoader" ).removeClass( 'Hidden' );

  	},

		10000);

  	$( 'html' ).css(
		{

				'overflow-y': 'hidden',

				'height': '100%'

		});

}

function hideLoader()
{

  	$( '.loader' ).addClass( 'Hidden' );

  	$( "#CloseAjaxLoader" ).addClass( 'Hidden' );

  	$( 'html' ).css(
		{

				'overflow-y': 'scroll',

				'height': '100%'

		});

}


$( function()
{

		$( "#CloseAjaxLoader" ).click( function()
		{

    		toggleLoader();

  	});

});
