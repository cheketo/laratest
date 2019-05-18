/*
|-------------------------------------------------------------------------------
|	All Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		createBranch();

		showBranchTab();

		toggleAddressComplements();

		googleMaps();

});


/*
|-------------------------------------------------------------------------------
|	Create Branch
|-------------------------------------------------------------------------------
*/

function createBranch()
{

		$( '.addBranch' ).click( function()
		{

				var name = $( '#new_branch_name' ).val();

				if( name )
				{

						addBranchLabel( name );

				}

				// askAndSubmit( '/usuarios/crear', '/usuarios?msg=insert&element=' + $( '#user' ).val(), '¿Desea crear el usuario <b>' + $( '#user' ).val() + '</b>?' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Add Branch Label
|-------------------------------------------------------------------------------
*/

function addBranchLabel( name )
{

		$( '.branchLabel' ).each( function()
	 	{

				$( this ).removeClass( 'mainBranchLabel' );

		})

		var html = '<div class="branchLabel mainBranchLabel" id="branch_label_1">' + name + '</div>';

		$( '#BranchLabelContainer' ).append( html );

}


/*
|-------------------------------------------------------------------------------
|	Show Branch Tabs
|-------------------------------------------------------------------------------
*/

function showBranchTab()
{

		$( '.showBranchTab' ).click( function()
		{

				var branch = $( this ).attr( 'branch' );

				var target = $( this ).attr( 'target' );

				$( '.branchTab[branch="' + branch + '"]' ).addClass( 'Hidden' );

				$( '.branchTab[branch="' + branch + '"]' );

				$( '#' + target ).removeClass( 'Hidden' );

				$( '.showBranchTab' ).children().removeClass( 'btn-primary' ).addClass( 'btn-info' );

				$( this ).children().first().removeClass( 'btn-info' ).addClass( 'btn-primary' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Show Address Complements
|-------------------------------------------------------------------------------
*/

function toggleAddressComplements()
{

		$( '.toggleAddressComplements' ).click( function()
		{

				var branch = $( this ).attr( 'branch' );

				$( '.addressComplement[branch="' + branch + '"]' ).toggleClass( 'Hidden' );

		});

}

/*
|-------------------------------------------------------------------------------
|	Google Maps
|-------------------------------------------------------------------------------
*/

function googleMaps()
{

    $( '.googleMap' ).each( function()
		{

				var lat = -34.6037;
				var lng = -58.3816;
				var zoom = 11;

				var map = new google.maps.Map( document.getElementById( 'googleMap' ),
				{

						center: { lat: lat, lng: lng },

						zoom: zoom,

						disableDefaultUI: true

				});

    });
}
