/*
|-------------------------------------------------------------------------------
|	List Functions
|-------------------------------------------------------------------------------
*/

function ShowRegsPerView()
{

		$( '#RegsPerViewButton' ).on( 'click', function()
		{

				$( this ).addClass( 'Hidden' );

				$( '#RegsPerViewDiv' ).removeClass( 'Hidden' );

		});

}

ShowRegsPerView();

function selectAllRows()
{

		$( '#SelectAll' ).click( function()
		{

				$( '.SelectRowButton' ).each( function()
				{

						if( !$( this ).parent().parent().parent().hasClass( 'SelectedRow' ) )
						{

								$( this ).click();

						}

				});

				$( '#SelectAll' ).addClass( 'Hidden' );

		    $( '#UnselectAll' ).removeClass( 'Hidden' );

		});

}

selectAllRows();

function unselectAllRows()
{

		$( '#UnselectAll' ).click( function()
		{

				$( '.SelectRowButton' ).each( function()
				{

						if( $( this ).parent().parent().parent().hasClass( 'SelectedRow' ) )
						{

							$( this ).click();

						}

				});

				$( '#SelectAll' ).removeClass( 'Hidden' );

			  $( '#UnselectAll' ).addClass( 'Hidden' );

		});

}

unselectAllRows();

// Row element selected
function rowElementSelected()
{

    $( '.SelectRowButton' ).click( function()
		{

        toggleRow( $( this ).parent().parent().parent() );

				if( $( this ).children( 'i' ).hasClass( 'fa-square-o' ) )
				{

						$( this ).children( 'i' ).removeClass( 'fa-square-o' );

						$( this ).children( 'i' ).addClass( 'fa-square' );

				}else{

						$( this ).children( 'i' ).removeClass( 'fa-square' );

						$( this ).children( 'i' ).addClass( 'fa-square-o' );

				}

    });

}

rowElementSelected();

function ShowListActions()
{

		$( '.listRow' ).hover( function()
		{

				if( !$( this ).hasClass( 'SelectedRow' ) )
				{

						$( this ).children( '.listActions' ).removeClass( 'Hidden' );

				}

		},

		function()
		{

				if( !$( this ).hasClass( 'SelectedRow' ) )
				{

						$( this ).children( '.listActions' ).addClass( 'Hidden' );

				}

		});

}

ShowListActions();

function toggleRow( element )
{

		var id = element.attr( 'id' ).split( '_' );

		if( element.hasClass( 'SelectedRow' ) )
		{

				unselectRow( id[ 1 ] );

				element.removeClass( 'SelectedRow' );

				element.removeClass( 'listRowSelected' );

				element.children( '.listActions' ).addClass( 'Hidden' );

		}else{

			selectRow( id[ 1 ] );

			element.addClass( 'SelectedRow' );

			element.addClass( 'listRowSelected' );

			element.children( '.listActions' ).removeClass( 'Hidden' );

		}

		showExpandButton();

		showContractButton();

		showSelectAllButton();

		showActivateButton();

    showDeleteButton();



}

function toggleRowDetailedInformation()
{

		$( '.ExpandButton,ContractButton' ).on( 'click', function( event )
		{

				event.stopPropagation();

				toggleExpandRow( $( this ) );

				showExpandButton();

				showContractButton();

		});

}

toggleRowDetailedInformation();

function showContractButton()
{

    if( $( '.SelectedRow' ).length > 1  && $( '.SelectedRow' ).children( '.listActions' ).children( 'div' ).children( '.roundItemActionsGroup' ).children( 'a' ).children( '.ContractButton' ).length > 0 )
    {

        $( '.ContractSelectedElements' ).removeClass( 'Hidden' );

    }else{

        $( '.ContractSelectedElements' ).addClass( 'Hidden' );

    }

}

function toggleExpandRow( element )
{

		var ElementID = element.attr( 'id');

		var ID = ElementID.split( '_' );

		var RowID = ID[ 1 ];

		var InfoDetail = $( '#row_' + RowID ).children( '.DetailedInformation' );

		element.toggleClass( 'ContractButton' );

		element.toggleClass( 'ExpandButton' );

		element.children( 'i' ).toggleClass( 'fa-plus' );

		element.children( 'i' ).toggleClass( 'fa-minus' );

		InfoDetail.toggleClass( 'Hidden' );

}

function showDeleteButton()
{

    if( $( '.SelectedRow' ).length > 1 && checkDeleteRestrictions() )
    {

        $( '.DeleteSelectedElements' ).removeClass( 'Hidden' );

    }else{

        $( '.DeleteSelectedElements' ).addClass( 'Hidden' );

    }

}

function showActivateButton()
{

    if( $( '.SelectedRow' ).length > 1 && checkActiveRestrictions() )
    {

        $( '.ActivateSelectedElements' ).removeClass( 'Hidden' );

    }else{

        $( '.ActivateSelectedElements' ).addClass( 'Hidden' );

    }

}

function showExpandButton()
{

    if( $( '.SelectedRow' ).length > 1 && $( '.SelectedRow' ).children( '.listActions' ).children( 'div' ).children( '.roundItemActionsGroup' ).children( 'a' ).children( '.ExpandButton' ).length > 0 )
    {

        $( '.ExpandSelectedElements' ).removeClass( 'Hidden' );

    }else{

        $( '.ExpandSelectedElements' ).addClass( 'Hidden' );

    }

}

function checkDeleteRestrictions()
{

		var isValid = true;

    $( '.SelectedRow' ).each( function()
		{

    		var id = $( this ).attr( 'id' ).split( '_' );

        if( $( '#delete_' + id[ 1 ] ).length < 1 )
        {

        		isValid = false;

        }

    });

    return isValid;

}

function checkActiveRestrictions()
{

    var isValid = true;

    $( '.SelectedRow' ).each( function()
		{

        var id = $( this ).attr( 'id' ).split( '_' );

        if( $( '#activate_' + id[ 1 ] ).length < 1 )
        {

        		isValid = false;

        }

    });

    return isValid;

}

function ShowGridAndList()
{

    $( '.ShowGrid,.ShowList' ).click( function()
		{

         $( '.GridElement' ).toggleClass( 'Hidden' );

         $( '.ListElement' ).toggleClass( 'Hidden' );

    });

}

ShowGridAndList();

function deleteElement( element )
{

		var elementID		= element.attr( 'id' ).split( '_' );

		var id					= elementID[ 1 ];

		var row					= $( '#row_' + id );

		var data 				= { id: id };

		var process 		= element.attr( 'url' );

		var result;

    $.ajax(
		{

    		type: 'POST',

        url: process,

				data: data,

        cache: false,

        async: false,

        success: function( response )
				{

						// var data = JSON.parse( response );

						if( response.valid == true )
						{

								row.remove();

								result = true;

						}else{

								console.log( response );

								result = false;

						}

        },

				error: function( response )
				{

						result = false;

						console.log( response )

				}

    });

    return result;

}

function activateElement( element )
{

		var elementID		= element.attr( 'id' ).split( '_' );

		var id					= elementID[ 1 ];

		var row					= $( '#row_' + id );

		var data 				= { id: id };

		var process 		= element.attr( 'url' );

		var result;

		$.ajax(
		{

    		type: 'POST',

        url: process,

				data: data,

        cache: false,

        async: false,

        success: function( response )
				{

						if( response.valid == true )
						{

								row.remove();

								result = true;

						}else{

								console.log( response );

								result = false;

						}

        },

				error: function( response )
				{

						result = false;

						console.log( response )

				}

    });

    return result;

}

function deleteListElement()
{

		$( '.deleteElement' ).click( function()
		{

				var element     = $( this );

				var elementID		= $( this ).attr( 'id' ).split( '_' );

				var id					= elementID[ 1 ];

				var row					= $( '#row_' + id );

				var question		= $( this ).attr( 'msgquestion' );

				var text_ok			= $( this ).attr( 'msgok' );

				var text_error	= $( this ).attr( 'msgerror' );

				if( !question || question == 'udefined' )
				{

						question = 'Está a punto de eliminar un registro ¿Desea continuar?';

				}

				if( !text_ok || text_ok == 'udefined' )
				{

						text_ok = 'El registro ha sido eliminado.';

				}

				if( !text_error || text_error == 'udefined' )
				{

						text_error = 'Hubo un problema. El registro no pudo ser eliminado.';

				}

				alertify.confirm( question, function( e )
				{

						if( e )
						{

								unselectRow( id );

								var result;

								result = deleteElement( element );

								if( result )
								{

										// notifySuccess( text_ok );

										submitSearch( '&msg=success&element=' + text_ok );

								}else{

										notifyError( text_error );

								}

						}

				});

				return false;

		});

}

deleteListElement();

function activateListElement()
{
		$( '.activateElement' ).click( function()
		{

				var element     = $( this );

				var elementID		= $( this ).attr( 'id' ).split( '_' );

				var id					= elementID[ 1 ];

				var row					= $( '#row_' + id );

				var question		= $( this ).attr( 'msgquestion' );

				var text_ok			= $( this ).attr( 'msgok' );

				var text_error	= $( this ).attr( 'msgerror' );

				if( !question || question == 'udefined' )
				{

						question = 'Está a punto de activar un registro ¿Desea continuar?';

				}

				if( !text_ok || text_ok == 'udefined' )
				{

						text_ok = 'El registro ha sido activado.';

				}

				if( !text_error || text_error == 'udefined' )
				{

						text_error = 'Hubo un problema. El registro no pudo ser activado.';

				}

				alertify.confirm( question, function( e )
				{

						if( e )
						{

								unselectRow( id );

								var result;

								result = activateElement( element );

								if( result )
								{

										submitSearch( '&msg=success&element=' + text_ok );

								}else{

										notifyError( text_error );

								}

						}

				});

				return false;

		});

}

activateListElement();


function massiveRowExpand()
{

		$( '.ExpandSelectedElements' ).click( function( e )
		{

				e.preventDefault();

				e.stopPropagation();

				$( '.SelectedRow' ).children( '.listActions' ).children( 'div' ).children( '.roundItemActionsGroup' ).children( 'a' ).children( '.ExpandButton' ).each( function()
				{

						toggleExpandRow( $( this ) );

				});

				$( this ).addClass( 'Hidden' );

				$( '.ContractSelectedElements' ).removeClass( 'Hidden' );

				unselectAll();

		});

}

massiveRowExpand();

function massiveRowContract()
{

		$( '.ContractSelectedElements' ).click( function( e )
		{
				e.preventDefault();

				e.stopPropagation();

				$( '.SelectedRow' ).children( '.listActions' ).children( 'div' ).children( '.roundItemActionsGroup' ).children( 'a' ).children( '.ContractButton' ).each( function()
				{

						toggleExpandRow( $( this ) );

				});

				$( this ).addClass( 'Hidden' );

				$( '.ExpandSelectedElements' ).removeClass( 'Hidden' );

				unselectAll();

		});

}

massiveRowContract();

function massiveElementDelete()
{

		$( '.DeleteSelectedElements' ).click( function( e )
		{

				e.preventDefault();

				e.stopPropagation();

				var delBtn		= $( this );

				var question		= delBtn.attr( 'msgquestion' );

				if( !question )
				{

						question = '¿Desea eliminar los registros seleccionados?';

				}

				var text_ok			= delBtn.attr( 'msgok' );

				if( !text_ok )
				{

						text_ok = 'Los registros seleccionados han sido eliminados.';

				}

				var text_error	= delBtn.attr( 'msgerror' );

				if( !text_error )
				{

						text_error = 'Hubo un problema al intentar eliminar los registros.';

				}


				alertify.confirm( question, function( e )
				{
		    		if( e )
						{

		        		var result;

			        	$( '.SelectedRow' ).children( '.listActions' ).children( 'div' ).children( '.roundItemActionsGroup' ).children( '.deleteElement' ).each( function()
								{

			        			result	= deleteElement( $( this ) );

			        	});

								unselectAll();

			        	if( result )
			        	{

				        		delBtn.addClass( 'Hidden' );

				        		submitSearch( '&msg=success&element=' + text_ok );

			        	}else{

			        			notifyError( text_error );

			        	}

		        }

		    });

		    return false;

		});

}

massiveElementDelete();

function massiveElementActivate()
{

		$( '.ActivateSelectedElements' ).click( function( e )
		{

				e.preventDefault();

				e.stopPropagation();

				var actBtn = $( this );

				var question		= actBtn.attr( 'msgquestion' );

				if( !question )
				{

						question = '¿Desea activar los registros seleccionados?';

				}

				var text_ok			= actBtn.attr( 'msgok' );

				if( !text_ok )
				{

						text_ok = 'Los registros seleccionados han sido activados.';

				}

				var text_error	= actBtn.attr( 'msgerror' );

				if( !text_error )
				{

						text_error = 'Hubo un problema al intentar activar los registros.';

				}

				alertify.confirm( question, function( e )
				{

	      		if( e )
						{

	        			var result;

	        			$( '.SelectedRow' ).children( '.listActions' ).children( 'div' ).children( '.roundItemActionsGroup' ).children( '.activateElement' ).each( function()
								{

	        					result = activateElement( $( this ) );

	        			});

								unselectAll();

	        			if( result )
	        			{

	        					actBtn.addClass( 'Hidden' );

	        					submitSearch( '&msg=success&element=' + text_ok );

	        			}else{

	        					notifyError( text_error );
	        			}

	        	}

	    	});

	    	return false;

		});

}

massiveElementActivate();

function unselectRow( id )
{

		var selected	= $( '#selected_ids' ).val();

		selected		= selected.replace( id + ',', '' );

		$( '#selected_ids' ).val( selected );

		$( '#selected_ids' ).change();

}

function selectRow( id )
{

		var selected = $( '#selected_ids' ).val();

		if( selected.indexOf( id ) == -1 )
		{

				if( selected )
				{

						$( '#selected_ids' ).val( selected + id + ',' );


				}else{

						$( '#selected_ids' ).val( id + ',' );

				}

		}

		$( '#selected_ids' ).change();

}

function unselectAll()
{

		$( '#selected_ids' ).val( '' );

		$( '#selected_ids' ).change();

}

function toggleSelectedRows()
{

		var ids = $( '#selected_ids' ).val();

		if( ids )
		{

				ids = ids.split( ',' );

				for( var i = 0; i < ids.length - 1; i++ )
				{

						if( $( '#row_' + ids[ i ] ).length > 0 )
						{

								toggleRow( $( '#row_' + ids[ i ] ) );

						}

				}

		}

}

function showSelectAllButton()
{

		if( $( '.SelectedRow' ).length == $( '.SelectRowButton' ).length )
		{

				$( '#SelectAll' ).addClass( 'Hidden' );

	    	$( '#UnselectAll' ).removeClass( 'Hidden' );

		}else{

				$( '#UnselectAll' ).addClass( 'Hidden' );

	    	$( '#SelectAll' ).removeClass( 'Hidden' );

		}

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// SEARCHER ///////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$( function()
{

	$( '.ShowFilters' ).click( function()
	{

			$( '.SearchFilters' ).toggleClass( 'Hidden' );

	});

	$( '.searchButton' ).click( function()
	{

			$( '#view_page' ).val( '1' );

			multipleInputTransform();

			submitSearch();

			unselectAll();

	});

	$( '#regsperview' ).change( function()
	{

			$( '#per_page' ).val( $( this ).val() );

			$( '.searchButton' ).click();

	});

	$( '#CoreSearcherForm input' ).keypress( function( e )
	{

			if( e.which == 13 )
			{

					$( '.searchButton' ).click();

			}

	});

	$( '#ClearSearchFields' ).click( function()
	{

			$( '#SearchFieldsForm input,select,textarea' ).val( '' );

			$( '#SearchFieldsForm .chosenSelect' ).each( function()
			{

					$( this ).val( '' );

					$( this ).trigger( 'chosen:updated' );

			});

	});

});

function multipleInputTransform()
{

		$( '.chosenSelect[multiple="multiple"]' ).each( function()
		{

				if( String( $( this ).val() ).substr( 0, 1 ) == ',' )
				{

						$( this ).val( String( $( this ).val() ).substr( 1 ) );

				}

		});

}

function GetSearchValues()
{

		var data = 'perpage=' + $( "#per_page" ).val();

		var currentPage = $( '#view_page' ).val();

		if( !isNaN( currentPage ) && currentPage > 0 )
		{

				data = data + '&page=' + currentPage;

		}

		$( '#CoreSearcherForm input,select,textarea' ).each( function()
		{

				data = data + '&' + $( this ).attr( 'id' ) + '=' + $( this ).val();

		});

		return data;

}

function GetURLValues( data )
{

		var loc = document.location.href;

		var getString = loc.split( '?' );


		if( getString[ 1 ] )
		{

				var values = getString[ 1 ].split( '&' );

				values.forEach( function( element )
				{

				  	element = element.split( '=' );

						if( element[ 1 ] && data.indexOf( element[ 0 ] + '=' ) == -1 && element[ 0 ] != 'element' && element[ 0 ] != 'msg' )
						{

								if( data != '' )
								{

										data = data + '&';

								}

								data = data + element[ 0 ] + '=' + element[ 1 ];

						}

				});

		}

		return data;

}

function submitSearch( additionalData )
{

		if( additionalData === undefined )
		{

				additionalData = '';

		}

		if( validate.validateFields( 'CoreSearcherForm' ) )
		{

				var data = GetSearchValues();

				data = GetURLValues( data );

				var formAction = $( '#CoreSearcherForm' ).attr( 'action' );

				var target = formAction  + '?' + data + additionalData;

				// alert( target );

				document.location = target;

				return false;

		}

}

function ChangePagerLinks()
{

		$( '.pagination > li > a' ).each( function()
		{



				var link = $( this ).attr( 'href' ).split( '?' );

				if( link[ 1 ] )
				{

						var data = GetURLValues( link[ 1 ] );

						$( this ).attr( 'href', link[ 0 ] + '?' + data );

				}



		});

}

$( document ).ready( function()
{

		ChangePagerLinks();

		if( typeof AdditionalSearchFunctions == 'function' )
		{

		    AdditionalSearchFunctions();

		}

});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// ORDERER ///////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(function()
{

		$( '.order-arrows' ).click( function()
		{

				$( '.sort-activated' ).removeClass( 'sort-activated' );

				var mode = $( this ).attr( 'mode' );

				$( this ).children( 'i' ).removeClass( 'fa-sort-alpha-' + mode );

				if( mode == 'desc' )
				{

						mode = 'asc';

				}else{

						mode = 'desc';

				}

				$( '#view_order_field' ).val( $( this ).attr( 'order' ) );

				$( '#view_order_mode' ).val( mode );

				$( this ).attr( 'mode', mode );

				$( this ).children( 'i' ).addClass( 'fa-sort-alpha-' + mode );

				$( this ).addClass( 'sort-activated' );

				$( '#view_page' ).val( '1' );

				submitSearch();

		});

});

$( document ).ready( function()
{

		if( typeof get[ 'view_order_field' ] !== 'undefined' )
		{

				$( '.SearchFilters' ).removeClass( 'Hidden' );

		}

})

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////// PAGER //////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(function()
{

		$( '.GoToPageBtn' ).click(function()
		{

				if( validate.validateFields( 'GoToPageForm' ) )
				{

						var url = window.location.href.split( '?' );

						var file = url[ 0 ];

						var parameters = 'page=' + $( '#go_to_page' ).val();

						for( var key in get )
						{

						    if( get.hasOwnProperty( key ) )
								{

										if( get[ key ] && key != 'page' && key != 'msg' && key != 'element' )
										{

												parameters = parameters + '&' + key + '=' + get[ key ];

										}

						    }

						}

						window.location.href = file + '?' + parameters;

				}

		});

});
