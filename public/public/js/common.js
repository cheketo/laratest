/*
|-------------------------------------------------------------------------------
|	Common Functions
|-------------------------------------------------------------------------------
*/

$( document ).ready( function()
{

		successNotify();

  	setDatePicker();

		inputMask();

		chosenSelect();

		SetAutoComplete();

		iCheck();

		goBack();

		if( $( "input[type='file']" ).length > 0 )
		{

				CustomizedFilefield();

		}

		$.ajaxSetup(
		{

        headers:
				{

            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

        }

    });

});


/*
|-------------------------------------------------------------------------------
| Customized File Field
|-------------------------------------------------------------------------------
| Customize a file input hidding it and adding a text input.
|
*/

function CustomizedFilefield()
{

		$( "input:file" ).change( function()
		{

				$( "#File" + $( this ).attr( "id" ) ).focus();

				$( "#File" + $( this ).attr( "id" ) ).val( $( this ).val().replace( "C:\\fakepath\\", "" ) );

				$( "#File" + $( this ).attr( "id" ) ).blur();

		});

		$( ".CustomizedFileField" ).click( function()
		{

				if( $( this ).attr( "id" ).substring( 0, 4 ) == "File" )
				{

						$( this ).blur();

						$( "#" + $( this ).attr( "id" ).substring( 4 ) ).click();

				}

		});

}

/*
|-------------------------------------------------------------------------------
| iCheckbox
|-------------------------------------------------------------------------------
| Customize a radio or checkbox input.
|
*/

function iCheck()
{

		$( '.iCheckbox' ).each( function()
		{

				var shape = $( this ).attr( 'shape' );

				if( !shape )
				{

						shape = 'square';

				}

				if( shape != 'polaris' && shape != 'futurico' )
				{

						var color = $( this ).attr( 'color' );

						if( !color )
						{

								color = 'orange';

						}

						color = '-' + color;

				}else{

						var color = '';

				}

				$( this ).iCheck(
				{

						inheritID: true,

						cursor: true,

						checkboxClass: 'iCheckbox_changeable icheckbox_' + shape + color,

						radioClass: 'iRadio_changeable iradio_' + shape + color

				});

		});

}

/*
|-------------------------------------------------------------------------------
| DatePicker
|-------------------------------------------------------------------------------
| Adds a claendar to an input.
|
*/

function datePicker( element )
{

		$( element ).datepicker(
		{

				autoclose: true,

				todayHighlight: true,

				language: 'es'

		});

}

function setDatePicker( element )
{

		if( $( ".datePicker" ).length > 0 )
  	{

				$.fn.datepicker.dates['es'] =
				{

						days: ["Domingo", "Lunes", "Martes", "Miércoles", "Juves", "Viernes", "Sábado"],

						daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],

						daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],

						months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],

						monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],

						today: "Hoy",

						clear: "Borrar",

						format: "dd/mm/yyyy",

						titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */

						weekStart: 1

				};

		    $( ".datePicker" ).each( function()
				{

		      	datePicker( this );

		    });

  	}

}


/*
|-------------------------------------------------------------------------------
| AutoComplete
|-------------------------------------------------------------------------------
| Transforms an input into an autocomplete input that loads data from an AJAX.
|
*/

function SetAutoComplete( selector, mode )
{

		if( typeof selector === "undefined" )
  	{

				selector = ".TextAutoComplete";

  	}

		if( typeof mode === "undefined" )
  	{

				mode = "notags";

		}

		if( $( selector ).length > 0 )
		{
				$( selector ).each( function()
				{

						try
						{

			 					$( this ).destroy();

	  				} catch ( e ) {}

						var id = $( this ).attr( 'id' ).split( "TextAutoComplete" );

						if( $( this ).attr( "cacheauto" ) )

								var cache = ( $( this ).attr( "cacheauto" ) == 'true' );

						if( $( this ).attr( "iconauto" ) )
						{

								var icon = $( this ).attr( "iconauto" );

						} else {

								var icon = '';

						}

						if( $( this ).attr( "charsauto" ) )
						{

								var minChars = parseInt( $( this ).attr( "charsauto" ) );

						} else {

								var minChars = 1;

						}

						if( $( this ).attr( "placeholderauto" ) )
						{

								var defaultSearchText = $( this ).attr( "placeholderauto" );

						} else {

								var defaultSearchText = 'Sin resultados';

						}

						AutoCompleteInput( id[1], cache, icon, minChars, defaultSearchText, mode )

				});
		}
}

var xhr;

function AutoCompleteInput( inputID, cache, icon, minChars, defaultSearchText, mode )
{

		if( typeof minChars === "undefined" )

    		minChars = 1;

		if( typeof cache === "undefined" )

				cache = false;

		if( typeof defaultSearchText === "undefined" )

				defaultSearchText = 'Sin resultados';

		if( typeof icon !== "undefined" )
		{

  			icon = '<i class="fa fa-' + icon + '"></i> ';

		} else {

				icon = '';

		}

  	$( "#TextAutoComplete" + inputID ).on( 'focusin', function( e )
		{

				if( !e.minChars )
				{

						$( "#TextAutoComplete" + inputID ).last_val = '\n';

						$( "#TextAutoCompleteasoc" ).trigger( 'keyup.autocomplete' );

				}

		});

		$( "#TextAutoComplete" + inputID ).autoComplete(
		{

		    minChars: minChars,

		    delay: 600,

		    cache: cache,

    		// hideResults: false,

    		source: function( term, response )
    		{

      			var target = $( "#TextAutoComplete" + inputID ).attr( "targetauto" );

      			var tableid = inputID;

      			if( $( "#TextAutoComplete" + inputID ).attr( "tableidauto" ) )

        				tableid = $( "#TextAutoComplete" + inputID ).attr( "tableidauto" );

      			var variables		= tableid + "=" + term;

  	  			var field;

      			if( $( "#TextAutoComplete" + inputID ).attr( "varsauto" ) != undefined )
  	  			{

    						var properties	= $( "#TextAutoComplete" + inputID ).attr( "varsauto" ).split( '///' );

    						for( var i = 0; i < properties.length; i++ )
    						{

										field = properties[i].split( ":=" );

										if( field[1] )
										{

												variables	= variables + "&" + field[0] + "=" + field[1];

    								} else {

    										variables	= variables + "&" + properties[i] + "=" + $( "#" + properties[i] ).val();

										}

    						}

  	  			}

      			$( "#" + inputID ).val( '' );

      			$( "#" + inputID ).change();

      			try
						{

								xhr.abort();

						} catch( e ) {}

      			xhr = $.post( target ,variables , function( data )
						{

								if( !data[0] )
        				{

          					data = 	[

																{

																		key : "",

																		text : "no-result"

																}

														];

        				}

								response( data );

								if ( typeof autocompleteResponseFunction === "function" )
								{

										autocompleteResponseFunction();

								}

								$( ".autocomplete-suggestion" ).click( function()
								{

										// console.log( "entra" );

        				});

      			},

						'json' );

				},

				renderItem: function ( item, search )
    		{

						var key = item.text;

      			var text = icon + item.text;

      			var id = item.id;

      			if( key == "no-result" )
      			{

								key = '';

								text = '<i>' + defaultSearchText + '</i>';
      			}

      			return '<div class="autocomplete-suggestion" data-key="' + key + '" data-id="' + id + '" data-val="' + search + '">' + text + '</div>';

    		},

				onSelect: function( e, term, item )
    		{

						if ( typeof autocompleteOnSelectBeforeFunction === "function" )
						{

								autocompleteOnSelectBeforeFunction( e, term, item );

	      		}

						if ( typeof autocompleteOnSelectReplaceFunction === "function" )
						{

								autocompleteOnSelectReplaceFunction( e, term, item );

						} else {

	        			var textval = item.data( 'key' );

	        			if( mode == "notags" )

	          				textval = textval.replace( /(<([^>]+)>)/ig, "" );

	        			$( "#TextAutoComplete" + inputID ).val( textval );

	        			$( "#" + inputID ).val( item.data( 'id' ) );

	        			$( "#" + inputID ).change();

	      		}

						if ( typeof autocompleteOnSelectAfterFunction === "function" )
						{

	          		autocompleteOnSelectAfterFunction( e, term, item );

	      		}

    		}

		});

		$( "#TextAutoComplete" + inputID ).focusout( function()
		{

				// console.log( inputID );

				// console.log( $( "#" + inputID ).val() );

    		if( !$( "#" + inputID ).val() )

						$( "#TextAutoComplete" + inputID ).val( '' );

		});

		return false;

}


/*
|-------------------------------------------------------------------------------
| Validate
|-------------------------------------------------------------------------------
| Input automatic validations.
|
*/

var validate    = new ValidateFields();

$( function()
{

		validateDivChange();

});

function validateDivChange()
{

		validate.createErrorDivs();

  	$( validateElements ).change( function()
		{

				validate.validateOneField( this );

		});

}


/*
|-------------------------------------------------------------------------------
| Cancel Button
|-------------------------------------------------------------------------------
| Go back when cancel button is clicked.
|
*/

function goBack()
{

		$( '.BtnCancel' ).click( function()
		{

				window.history.back();

		});

}


/*
|-------------------------------------------------------------------------------
| Chosen Select
|-------------------------------------------------------------------------------
| Transforms a select into an input with autocomplete option.
|
*/

function chosenSelect()
{

  	if( $( '.chosenSelect' ).length > 0 )
  	{

	  		$( '.chosenSelect' ).chosen(
				{

						disable_search_threshold: 10,

						search_contains: true,

						hide_results_on_select: false,

						max_shown_results: 100

				});

	  		$( 'select.chosenSelect' ).children( "option[value=' ']" ).val( '' );

				$( 'select.chosenSelect' ).each(function()
				{

						var id = $( this ).attr( 'id' );

						var tabindex = $( this ).attr( 'tabindex' );

						if( tabindex )
						{

								$( '#' + id + '_chosen' ).children( '.chosen-choices' ).children( '.search-field' ).children( '.chosen-search-input' ).attr( 'tabindex', tabindex.replace('"','') );

						}

				});

  	}

}


/*
|-------------------------------------------------------------------------------
| Submit Data
|-------------------------------------------------------------------------------
| Customized submit event.
|
*/

function submitData()
{

    var formFiles;

    var checkValue;

    var checkID;

    var elementID;

    var checkbox    = [];

    var checkboxID  = [];

    var variables   = [];

    var data        = new FormData();

		var json				= {}

		var AssocArray 	= {};

    var i           = 0;

    var element;

    var id;

    $( 'textarea, select, input[type!="checkbox"]' ).each( function()
    {

        elementID   = $( this ).attr( "id" );

        if( $( this ).attr( "type" ) == "file" )
        {

	          if( $( this ).attr( "id" ) )
	          {

		            formFiles	= document.getElementById( elementID ).files;

		            element 	= { id: elementID, value: formFiles[ 0 ] };

		            variables[ variables.length ] = element;

	          }

        }else{

						element = { id: elementID, value: $( this ).val() };

            variables[ variables.length ] = element;

        }

    });

    $( 'input[type="checkbox"]:checked' ).each( function()
    {

        checkID = $( this ).attr( "id" );

        if( checkboxID.indexOf( checkID ) == -1 )
        {

            checkboxID[ checkboxID.length ] = checkID;

            checkValue = "";

            $( 'input[type="checkbox"][name="' + checkID + '"]:checked' ).each( function()
            {

                if( checkValue != "" )
                {

                    checkValue = checkValue + "," + $( this ).val();

                }else{

                    checkValue = $( this ).val();

                }

            });

						variables[ variables.length ] = { id:checkID, value:checkValue };

        }

    });

		// console.log( variables );

    while( element = variables[ i++ ] )
    {

      	data.append( element.id, element.value );

    }

		// console.log( data );

    return data;

		// return JSON.stringify(AssocArray);

}

function submitFields( process, success, error )
{

    var data    = submitData();

    $.ajax(
		{

    		url: process,

        type: 'POST',

				contentType: false,

        data: data,

        processData: false,

        cache: false,

        async: true,

        success: function( response )
				{

						success( response );

        },

				error: function( response )
				{

						error( response );

				}

    });

}

function askAndSubmit( route, target, qtext = "¿Desea guardar la informaci&oacute;n?", etext = "Ha ocurrido un error en el proceso de guardado.", form = '*' )
{

		if( validate.validateFields( form ) )
		{

				alertify.confirm( qtext, function( e )
				{

						if( e )
						{

								var error	= function( response )
								{

										$( "input,select" ).blur();

										notifyError( etext );

										console.log( response );

										return false;

								}

								var success		= function( response )
								{

										if( target && target != '' )
										{

												document.location = target;

										}else{

												return true;

										}

								}

								submitFields( route, success, error );

						}

				});

		}

}


/*
|-------------------------------------------------------------------------------
| Input Mask
|-------------------------------------------------------------------------------
| Adds a mask to an input.
|
*/

function inputMask()
{

		if( $( ".inputMask" ).length > 0 )
		{

	  		$( ".inputMask" ).each( function()
				{

	    			if( !$( this ).inputmask( "hasMaskedValue" ) )
	    			{

	      				$(this).inputmask();  //static mask

	    			}

	  		});

		}

}


/*
|-------------------------------------------------------------------------------
| Logout
|-------------------------------------------------------------------------------
| Terminate session variables and redirects to login.
|
*/

$(function()
{

	  $( "#headerLogoutButton" ).click(function()
		{

				alertify.labels.ok = "Si";

				alertify.labels.cancel = "No";

	      alertify.confirm( "¿Desea salir?", function( e )
				{
	      		if( e )
						{

	              var form		= $( "#headerLogoutForm" );

	              $.ajax(
								{

	                  type: "POST",

	                  url: form.attr( 'action' ),

										data: form.serialize(),

	                  success: function()
										{

	                      document.location = '/login';

	                  },

										error: function()
										{

												document.location = '/login?error=session';

										}

	              });

	          }

	      });

	  });

});



/*
|-------------------------------------------------------------------------------
| Notify Error
|-------------------------------------------------------------------------------
| Creates a customizable error message.
|
*/

function notifyError( msgNotify, delay )
{

		if( typeof delay === "undefined" )
		{

    		delay = 30000;

    }

    $.notify(
		{

        message: '<div class="txC"><i class="fa fa-exclamation-circle"></i> ' + msgNotify + '</div>'

    }, {

        type: 'danger',

        allow_dismiss: true,

        delay: delay,

        placement:
				{

            from: "top",

            align: "center"

        }

    });

}


/*
|-------------------------------------------------------------------------------
| Notify Success
|-------------------------------------------------------------------------------
| Creates a customizable success message.
|
*/

function notifySuccess( msgNotify, delay )
{

    if( typeof delay === "undefined" )
		{

        delay = 15000;

    }

    $.notify(
		{

        message: '<div class="txC"><i class="fa fa-check-circle"></i><br>' + msgNotify + '</div>'

    }, {

        type: 'success',

        allow_dismiss: true,

        delay: delay,

        placement:
				{

            from: "bottom",

            align: "left"

        }

    });

}


/*
|-------------------------------------------------------------------------------
| Notify Info
|-------------------------------------------------------------------------------
| Creates a customizable informational message.
|
*/

function notifyInfo( msgNotify, delay )
{

    if( typeof delay === "undefined" )
		{

        delay = 15000;

    }

    $.notify(
		{

        message: '<div class="txC"><i class="fa fa-info-circle"></i><br>' + msgNotify + '</div>'

    }, {

        type: 'info',

        allow_dismiss: true,

        delay: delay,

        placement:
				{

            from: "bottom",

            align: "left"

        }

    });

}


/*
|-------------------------------------------------------------------------------
| Notify Warning
|-------------------------------------------------------------------------------
| Creates a customizable warning message.
|
*/

function notifyWarning( msgNotify, delay )
{

    if( typeof delay === "undefined" )
		{

        delay = 30000;

    }

    $.notify(
		{

        message: '<div class="txC"><i class="fa fa-warning"></i><br>' + msgNotify + '</div>'

    }, {

        type: 'warning',

        allow_dismiss: true,

        delay: delay,

        placement:
				{

            from: "bottom",

            align: "left"

        }

    });

}


/*
|-------------------------------------------------------------------------------
| Notify
|-------------------------------------------------------------------------------
| Creates a customizable message.
|
*/

function notifyMsg( typeMsg, msgNotify )
{

    $.notify(
		{

        message: msgNotify

    }, {

        type: typeMsg

    });

}

/*
|-------------------------------------------------------------------------------
|	Success Msg
|-------------------------------------------------------------------------------
*/

function successNotify()
{

		if( get[ 'msg' ] == 'success' && get[ 'element' ] )
		{

				notifySuccess( get[ 'element' ] );

		}

}


/*
|-------------------------------------------------------------------------------
| Sidebar Menu Cookie
|-------------------------------------------------------------------------------
| Sets a cookie that stores the collapsed status of the sidebar menu.
|
*/

function sidebarMenu()
{

  	$( '#SidebarToggle' ).click( function()
		{

    		if ( $( 'body' ).hasClass( 'sidebar-collapse' ) )
    		{

      			setCookie( "sidebarmenu", '', 365 );

    		} else {

      			setCookie( "sidebarmenu", 'sidebar-collapse', 365 );

    		}

  	});

}


/*
|-------------------------------------------------------------------------------
| Set Cookie
|-------------------------------------------------------------------------------
| Sets a cookie with given values.
|
*/

function setCookie( cname, cvalue, exdays )
{

    var d = new Date();

    d.setTime( d.getTime() + ( exdays * 24 * 60 * 60 * 1000 ) );

    var expires = "expires=" + d.toUTCString();

    document.cookie = cname + "=" + cvalue + "; " + expires + ";path=/";

}


/*
|-------------------------------------------------------------------------------
| Get Cookie
|-------------------------------------------------------------------------------
| Gets the value of a given cookie.
|
*/

function getCookie( cname )
{

    var name = cname + "=";

    var ca = document.cookie.split( ';' );

    for ( var i = 0; i < ca.length; i++ )
		{

        var c = ca[ i ];

        while ( c.charAt( 0 ) == ' ' )
				{

            c = c.substring( 1 );

        }

        if ( c.indexOf( name ) == 0 )
				{

            return c.substring( name.length, c.length );

        }

    }

    return "";

}


/*
|-------------------------------------------------------------------------------
| Set Local Storage Variable
|-------------------------------------------------------------------------------
| Sets variable to the local storage.
|
*/

function storeLocal( name, val )
{

  	if ( typeof ( Storage ) !== "undefined" )
		{

    		localStorage.setItem( name, val );

  	} else {

    		window.alert( 'Please use a modern browser to properly view this template!' );

  	}

}


/*
|-------------------------------------------------------------------------------
| Get Local Storage Variable
|-------------------------------------------------------------------------------
| Gets a variable from local storage with given value.
|
*/

function getLocal( name )
{

		if ( typeof ( Storage ) !== "undefined" )
		{

    		return localStorage.getItem( name );

  	} else {

    		window.alert( 'Please use a modern browser to properly view this template!' );

  	}

}


/*
|-------------------------------------------------------------------------------
| Get URL Variables
|-------------------------------------------------------------------------------
| Gets all variables from URL.
|
*/

function getVars()
{

		var loc = document.location.href;

    var getString = loc.split( '?' );

    if( getString[ 1 ] )
		{

        var GET = getString[1].split( '&' );

        var get = {};//This object will be filled with the key-value pairs and returned.

        for( var i = 0, l = GET.length; i < l; i++ )
				{

            var tmp = GET[ i ].split( '=' );

            get[ tmp[ 0 ] ] = unescape( decodeURI( tmp[ 1 ] ) );

        }

        return get;

    }else{

        return "";

  	}
}

var get = getVars();
