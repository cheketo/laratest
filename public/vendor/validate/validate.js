/*******************************************************************************\
|																																 								|
|===============================================================================|
|																																 								|
|																		ABOUT												 								|
|																																 								|
|===============================================================================|
|																																 								|
|												Validate Fields V 1.3.2									 								|
|					Developed by Alejandro Romero (romero.m.alejandro@gmail.com)					|
|																																 								|
|===============================================================================|
|																																 								|
|																	DESCRIPTION										 								|
|																																 								|
|===============================================================================|
|																																 								|
| This is a js class for validating fields of HTML forms. Its purpose is to			|
| validate, through attributes, the inputs of an HTML document. Requires JQuery	|
|	to use it.																																		|
|																																 								|
|===============================================================================|
|																																 								|
|																		USAGE												 								|
|																																 								|
|===============================================================================|
|																																 								|
|		1)	validateEmpty: Checks if the field is empty.														|
|				Declaration: 'validateEmpty="Please, complete this field"'							|
|				Data: Text																															|
|																																 								|
|···············································································|
|																																 								|
|		2)	validateMinLength: Checks if the field have a minimum quantity of				|
|				characters.																															|
|				Declaration: 'validateMinLenght="5///Please, enter at least 5 					|
|				characters"'																														|
|				Data: MinVal///Text																											|
|																																 								|
|···············································································|
|																																 								|
|		3)	validateMaxLength: Checks if the field reaches a maximum quantity of		|
|				characters.																															|
|				Declaration: 'validateMaxLenght="25///Please, enter less than 25				|
|				characters"'																														|
|				Data: MaxVal///Text																											|
|																																 								|
|···············································································|
|																																 								|
|		4)	validateEmail: Checks if the field contains a valid email.							|
|				Declaration: 'validateEmail:"Please, enter a valid email"'							|
|				Data: Text																															|
|																																 								|
|···············································································|
|																																 								|
|		5) 	validateOnlyNumbers: Checks if the field contains only numbers.					|
|				Declaration: 'validateOnlyNumbers="Please, enter only numbers"'					|
|				Data: Text																															|
|																																 								|
|···············································································|
|																																 								|
|		6)  validateEqualToField: Checks if the field value is equal to the value		|
|				of the field specificated in the argument.															|
|				Declaration: 'validateEqualToField="fieldID///Both fields must match"'	|
|				Data: TargetField///Text																								|
|																																 								|
|···············································································|
|																																 								|
|		7)	validateFromFile: Matchs the field value with a file.										|
|				Declaration: 'validateFromFile="process.php///User already exists				|
|				///otherfieldID///variable:=value"'																			|
|				Data: File///Text///(FieldID)///...///(Key:=Value)///...								|
|																																 								|
|···············································································|
|																																 								|
|		8)	mustBeChecked: Checks if a number of checkboxes are checked.						|
|				Declaration: 'mustBeChecked="1///At least 1 of the checkboxes must be		|
|				checked"'																																|
|				Declaration: 'mustBeChecked="3///Only 3 of the checkboxes can be				|
|				checked///limited"'																											|
|				Declaration: 'mustBeChecked="2///Only 2 of the checkboxes can be				|
|				checked///strict"'																											|
|				Data: Value///Text///(Mode)																							|
|																																 								|
|···············································································|
|																																 								|
|		9)	validateMaxValue: Checks if the field reaches a maximum numeric value.	|
|				Declaration: 'validateMaxValue="25.07///Please, enter a number lower		|
|				than 25.07"'																														|
|				Data: MaxVal///Text																											|
|																																 								|
|···············································································|
|																																 								|
|		10) validateMinValue: Checks if the field have a minimum value.							|
|				Declaration: 'validateMinValue="25.07///Please, enter a number higher		|
|				than 25.07"'																														|
|				Data: MaxVal///Text																											|
|																																 								|
|===============================================================================|
|																																 								|
\*******************************************************************************/

		var validateShowEffect = "default";

		var validateHideEffect;

		var validateErrorClass;

		var validateTag;

		var validateValid;

		var validateElements;

		var validateErrorElements = "";

		var validateDelimiter	= '///';

		var validateCheckboxGroups		= new Array();

		function ValidateFields()
		{

				validateErrorClass 	= "ErrorText Red";

				validateElements		= "input[type!='hidden'],select,textarea";

				validateTag					= "div";

				validateValid;

		}

		ValidateFields.prototype.setErrorClass	= function( ErrorClass )
		{

				validateErrorClass	= ErrorClass;

		}

		ValidateFields.prototype.setShowEffect	= function( ShowEffect )
		{

				validateShowEffect	= ShowEffect;

		}

		ValidateFields.prototype.setHideEffect	= function( HideEffect )
		{

				validateHideEffect	= HideEffect;

		}

		ValidateFields.prototype.setTag	= function( Tag )
		{

				validateTag	= Tag;

		}

		ValidateFields.prototype.setElements	= function( Elements )
		{

				validateElements	= Elements;

		}

		ValidateFields.prototype.setDelimiter	= function( Delimiter )
		{

				validateDelimiter	= Delimiter;

		}

		ValidateFields.prototype.createErrorDivs = function()
		{

				$( validateTag + '[id$="ErrorDiv"]' ).remove();

				$( validateElements ).each( function()
				{

						$( this ).parent().append( '<' + validateTag + ' id="' + $( this ).attr( "id" ) + 'ErrorDiv" class="' + validateErrorClass + '"></' + validateTag + '>' );

				});

		}

		ValidateFields.prototype.empty	= function( object )
		{

				var isempty	= false;

				if( $( object ).attr( "validateEmpty" ) )
				{

						isempty	= ValidateFields.prototype.isEmpty( $( object ).val() ) || !ValidateFields.prototype.isDifferent( $( object ).val(), $( object ).attr( "default" ) );

				}

				return isempty;

		}

		ValidateFields.prototype.isEmpty	= function( value )
		{

				if( !value )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.isDifferent	= function( value, def )
		{

				if( value != def )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.minValue	= function( object )
		{

				var	minVal;

				minval	= false;

				if( $( object ).attr( "validateMinValue" ) && $( object ).val() != "" )
				{

						minVal	= $( object ).attr( "validateMinValue" ).substring( 0, $( object ).attr( "validateMinValue" ).indexOf( validateDelimiter ) );

						minval	= ValidateFields.prototype.isMinValue( parseFloat( $( object ).val() ), minVal );

				}

				return minval;

		}

		ValidateFields.prototype.isMinValue	= function( value, minVal )
		{

				if( value < minVal )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.minLength	= function( object )
		{

				var	minVal;

				minlength	= false;

				if( $( object ).attr( "validateMinLength" ) && $( object ).val() != "" )
				{

						minVal		= $( object ).attr( "validateMinLength" ).substring( 0, $( object ).attr( "validateMinLength" ).indexOf( validateDelimiter ) );

						minlength	= ValidateFields.prototype.isMinLength( $( object ).val().length, minVal );

				}

				return minlength;

		}

		ValidateFields.prototype.isMinLength	= function( value, minVal )
		{

				if( value < minVal )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.maxValue	= function( object )
		{

				var	maxVal;

				maxval	= false;

				if( $( object ).attr( "validateMaxValue" ) && $( object ).val() != "" )
				{

						maxVal	= $( object ).attr( "validateMaxValue" ).substring( 0, $( object ).attr( "validateMaxValue" ).indexOf( validateDelimiter ) );

						maxval	= ValidateFields.prototype.isMaxValue( parseFloat( $( object ).val() ), maxVal );
				}

				return maxval;

		}

		ValidateFields.prototype.isMaxValue	= function( value, maxVal )
		{

				if( value > maxVal )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.maxLength	= function( object )
		{

				var	maxVal;

				maxlength	= false;

				if( $( object ).attr( "validateMaxLength" ) && $( object ).val() != "" )
				{

						maxVal		= $( object ).attr( "validateMaxLength" ).substring( 0, $( object ).attr( "validateMaxLength" ).indexOf( validateDelimiter ) );

						maxlength	= ValidateFields.prototype.isMaxLength( $( object ).val().length, maxVal );

				}

				return maxlength;

		}

		ValidateFields.prototype.isMaxLength	= function( value, maxVal )
		{

				if( value > maxVal )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.equalToField	= function( object )
		{

				var	field;

				var equal = false;

				if( $( object ).attr( "validateEqualToField" ) )
				{

						field		= $( object ).attr( "validateEqualToField" ).substring( 0, $( object ).attr( "validateEqualToField" ).indexOf( validateDelimiter ) );

						equal		= $( object ).val() != $( "#" + field ).val();

				}

				return equal;

		}

		ValidateFields.prototype.email	= function( object )
		{

				var isemail	= false;

				if( $( object ).attr( "validateEmail" ) && $( object ).val() != "" )
				{

						isemail	= ValidateFields.prototype.isEmail( $( object ).val() );

				}

				return isemail;

		}

		ValidateFields.prototype.isEmail	= function( value )
		{

				if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test( value ) )

						return false;

				else

						return true;

		}

		ValidateFields.prototype.onlyNumbers	= function( object )
		{

			var isonlynumbers	= false;

			if( $( object ).attr( "validateOnlyNumbers" ) )
			{

					isonlynumbers	= !ValidateFields.prototype.isOnlyNumbers( $( object ).val() );

			}

				return isonlynumbers;

		}

		ValidateFields.prototype.isOnlyNumbers	= function( value )
		{

				if( value.length > 0 )

				  	return !isNaN( parseFloat( value) ) && isFinite( value );

				else

						return true;

		}

		ValidateFields.prototype.isNotFilled	= function( object )
		{

				if( $( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html() == "" )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.fromFile = function( object )
		{

				var fromfile	= false;

				if( $( object ).attr( "validateFromFile" ) )
				{

						fromfile	= ValidateFields.prototype.validateFromFile( object );

				}

				return !fromfile;

		}

		ValidateFields.prototype.validateFromFile = function( object )
		{

				var validatefromfile	= false;

				var properties				= $( object ).attr( "validateFromFile" ).split( validateDelimiter );

				var value							= $( object ).val();

				var id								= $( object ).attr( "id" );

				var file							= properties[ 0 ];

				var text							= properties[ 1 ];

				var string						= id + '=' + value;

				var field;

				for( var i = 2; i < properties.length; i++ )
				{

						field = properties[ i ].split( ":=" );

						if( field[ 1 ] )

								string	= string + "&" + field[ 0 ] + "=" + field[ 1 ];

						else

								string	= string + "&" + properties[ i ] + "=" + $( "#" + properties[ i ] ).val();

				}

				$.ajax(
				{

						type: 		"POST",

						url: 			file,

						data: 		string,

						dataType: "json",

						cache: 		true,

						async: 		false,

						success: function( data )
						{

								validatefromfile = data.valid;

						},

						error: function( data )
						{

								console.log('An error has ocurred while executing a validation from file.');

								console.log(data);

						}

				});

				return validatefromfile;

		}


		ValidateFields.prototype.mustBeChecked	= function( object )
		{

				var name 											= $( object ).attr( "name" );

				var disabled									= $( object ).attr( "disabled" );

				var display										= $( object ).is( ':visible' ) && $( object ).parents( ':hidden' ).length == 0;

				var validateCheckboxGroups		= new Array();

				if( $( object ).attr( "mustBeChecked" ) && disabled != "disabled" && display && !inArray( name, validateCheckboxGroups ) )
				{

						validateCheckboxGroups.push( name );

						//$('input[type="checkbox"][name="'+name+'"]').each(function(){if(this!=object)$(this).attr('mustBeChecked','')});

						var properties		= $( object ).attr( "mustBeChecked" ).split( validateDelimiter );

						var checks 				= properties[ 0 ];

						var mode 					= properties[ 2 ];

						var checked 			= $( 'input[type="checkbox"][name="' + name + '"]:checked:not(disabled)' ).length;

						if( mode ) mode 	= mode.toLowerCase();

						switch( mode )
						{

								case 'strict':

										return checked != checks;

								break;

								case 'limited':

										return checked > checks;

								break;

								default:

										return checked < checks;

								break;

						}

				}else{

						return false;

				}

		}

		ValidateFields.prototype.getLastValidation = function()
		{

				return validateErrorElements;

		}


		ValidateFields.prototype.validateFields	= function( Form )
		{

				validateValid		= true;

				validateCheckboxGroups		= new Array();

				var validateObject;

				if( !Form || Form == '*' )
				{

						validateObject	= $( validateElements );

				}else{

						var elements 		= validateElements.split( ',' );

						validateObject	= $( '#' + Form + ' ' + elements.join( ',#' + Form + ' ' ) );

				}

				if( !validateObject.attr( 'id' ) ) validateValid	= false;

				validateObject.each( function()
				{

						if( ValidateFields.prototype.validateField( this ) && validateValid )

								validateValid	= true;

						else

								validateValid	= false;

				});

				return validateValid;

		}

		ValidateFields.prototype.validateOneField	= function( object )
		{

			validateCheckboxGroups = new Array();

			ValidateFields.prototype.validateField( object );

		}

		ValidateFields.prototype.validateField = function( object )
		{

				var valid	= true;

				if( !ValidateFields.prototype.isClearDiv( object ) ) ValidateFields.prototype.hideDiv( object );

				if( ValidateFields.prototype.empty( object ) )
				{

						valid	= false;

						$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( $( object ).attr( "validateEmpty" ) );

				}

				if( valid && ValidateFields.prototype.minValue( object ) )
				{

						valid			= false;

						var text	= $( object ).attr( "validateMinValue" ).substring( $( object ).attr( "validateMinValue" ).indexOf( validateDelimiter ) + validateDelimiter.length );

						$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( text );

				}

				if( valid && ValidateFields.prototype.minLength( object ) )
				{

						valid			= false;

						var text	= $( object ).attr( "validateMinLength" ).substring( $( object ).attr( "validateMinLength" ).indexOf( validateDelimiter ) + validateDelimiter.length );

						$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( text );

				}

					if( valid && ValidateFields.prototype.maxValue( object ) )
					{

							valid			= false;

							var text	= $( object ).attr( "validateMaxValue" ).substring( $( object ).attr( "validateMaxValue" ).indexOf( validateDelimiter ) + validateDelimiter.length );

							$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( text );

					}

					if( valid && ValidateFields.prototype.maxLength( object ) )
					{

							valid			= false;

							var text	= $( object ).attr( "validateMaxLength" ).substring( $( object ).attr( "validateMaxLength" ).indexOf( validateDelimiter ) + validateDelimiter.length );

							$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( text );

					}

					if( valid && ValidateFields.prototype.email( object ) )
					{

							valid	= false;

							$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( $( object ).attr( "validateEmail" ) );

					}

					if( valid && ValidateFields.prototype.onlyNumbers( object ) )
					{

							valid	= false;

							$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( $( object ).attr( "validateOnlyNumbers" ) );

					}

					if( valid && ValidateFields.prototype.equalToField( object ) )
					{

							valid			= false;

							var text	= $( object ).attr( "validateEqualToField" ).substring( $( object ).attr( "validateEqualToField" ).indexOf( validateDelimiter ) + validateDelimiter.length );

							$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( text );

					}

					if( valid && ValidateFields.prototype.mustBeChecked( object ) )
					{

							valid			= false;

							var text	= $( object ).attr( "mustBeChecked" ).substring( $( object ).attr( "mustBeChecked" ).indexOf( validateDelimiter ) + validateDelimiter.length );

							notifyError( text, 1500 );

					}

					if( valid && ValidateFields.prototype.fromFile( object ) )
					{

							var attr 	= $( object ).attr( "validateFromFile" );

							if( attr )
							{

									valid			= false;

									var text	= attr.substring( attr.indexOf( validateDelimiter ) + validateDelimiter.length );

									if( text.substring( 0, text.indexOf( validateDelimiter ) ) )

											text			= text.substring( 0, text.indexOf( validateDelimiter ) );

									$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html( text );

							}

					}

					if( !valid ) ValidateFields.prototype.showDiv( object );

					return valid;

		}

		ValidateFields.prototype.isClearDiv	= function( object )
		{

				if( $( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).html() == "" )

						return true;

				else

						return false;

		}

		ValidateFields.prototype.hideDiv	= function( object )
		{

				if( !validateValid )
				{

						switch( validateHideEffect )
						{

								case "fade":

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).fadeOut( 1000 );

								break;

								case "slide":

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).slideUp();

								break;

								case "hide":

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).hide();

								break;

								default:

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).hide();

								break;

						}

				}else{

						$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).hide();

				}

		}

		ValidateFields.prototype.showDiv	= function( object )
		{

				validateErrorElements = validateErrorElements + $( object ).attr( "id" ) + " ";

				if( !validateValid )
				{

						switch( validateShowEffect.toLowerCase() )
						{

								case "fade":

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).fadeIn( 5000 );

								break;

								case "slide":

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).slideDown();

								break;

								case "show":

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).hide();

								break;

								default:

										$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).show();

								break;

						}

				}else{

						$( "#" + $( object ).attr( "id" ) + "ErrorDiv" ).show();

				}

		}

		// Auxiliar Function: Pause

		ValidateFields.prototype.pauseProc = function( millis )
		{

				var date 			= new Date();

				var curDate 	= null;

				do
				{

						curDate 	= new Date();

				}while( curDate-date < millis );

		}
