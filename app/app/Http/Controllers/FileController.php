<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{

		const DEFAULT_NEW_FILE_ROUTE = 'uploads/new/images';

		public function upoadImage( Request $request )
		{

				if( $request->ajax() )
				{

						if( request()->hasFile( 'image' ) )
						{

							  $image								= $request->file( 'image' );

								$originalName 				= $request->file( 'image' )->getClientOriginalName();

								$size 								= $request->file( 'image' )->getClientSize();

							  $extension 						= $image->getClientOriginalExtension(); // getting image extension

							  $imagename 						= sha1(time());

								$route 								= $request->input( 'image_route' ) ? $request->input( 'image_route' ) : self::DEFAULT_NEW_FILE_ROUTE;

							  $image->move( $route, $imagename . '.' . $extension );

								$file 								= new File();

								$file->name 					= $imagename;

								$file->original_name 	= $originalName;

								$file->route 					= '/' . $route . '/' . $imagename . '.' . $extension;

								$file->type 					= $extension;

								$file->size 					= $size;

								$file->save();

								return response()->json(
								[

										'route' 					=> $file->route,

										'id' 							=> $file->id,

										'name' 						=> $file->name,

										'original_name' 	=> $file->original_name,

										'type' 						=> $file->type,

										'size' 						=> $file->size

								]);

						}

				}else{

						echo "No es AJAX request";

				}

		}

		public static function findOrCreate( $route )
		{

				$file = File::where( 'route', $route )->first();

				if( $file )
				{

						return $file;

				}else{

						if( strpos($route, '/' ) === 0 )
						{

								$route = substr( $route, 1 );

						}

						if( file_get_contents( $route ) !== false )
						{

								$data = array_reverse( explode( '/', $route ) );

								$data = explode( '.', $data[0] );

								$name = $data[0];

								$type = $data[1]? $data[1] : '';

								$file = new File();

								$file->route = '/' . $route;

								$file->name = $name;

								$file->type = $type;

								$file->save();

								return $file;

						}else{

								return false;

						}

				}

		}

}
