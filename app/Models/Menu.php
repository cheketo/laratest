<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Collection;

class Menu extends Model
{

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */

		protected $table = 'menus';

		protected $fillable = [
				'title_menu', 'title_page', 'title_tab', 'icon',
		];

		public function parent()
		{

				return $this->hasOne( 'App\Models\Menu', 'id', 'parent_id' );

		}

		public function children()
		{

				return $this->hasMany( 'App\Models\Menu', 'parent_id' );

		}

		public function route()
    {

        return $this->belongsTo( 'App\Models\WebRoute' );

    }

		public function getRoute()
		{

				$Route = '/' . $this->title_menu;

				if( $this->parent_id > 0 )
				{

						$Route = $this->parent->getRoute() . $Route;

				}

				return $Route;

		}

		public function getParents()
		{

				$parents = collect( array() );

				if( $this->parent )
				{

						$parents[] 	= $this->parent;

						$parents 		= $parents->concat( $this->parent->getParents() );

				}

				return $parents;

		}

		// Scopes
		public function scopeTitleMenu( $query, $titleMenu )
		{

				if( trim( $titleMenu ) != '' )
				{

						$query->where( 'menus.title_menu', 'LIKE', '%' . $titleMenu . '%' );

				}

		}

		public function scopeParentName( $query, $parentName )
		{

				if( trim( $parentName ) != '' )
				{

						$query->join( 'menus as parent', 'parent.id', '=', 'menus.parent_id' );

						$query->where( 'parent.title_menu', 'LIKE', '%' . $parentName . '%' );

				}

		}

		public function scopeRoute( $query, $route )
		{

				if( trim( $route ) != '' )
				{

						$query->join( 'routes', 'routes.id', '=', 'menus.route_id' );

						$query->where( 'routes.route', 'LIKE', '%' . $route . '%' );

				}

		}



		public function scopeParentId( $query, $parentId )
		{

				if( trim( $parentId ) != '' && $parentId > 0 )
				{

						$query->where( 'menus.parent_id', '=', $parentId );

				}

		}

		public function scopeRouteId( $query, $routeId )
		{

				if( trim( $routeId ) != '' && $routeId > 0 )
				{

						$query->where( 'menus.route_id', '=', $routeId );

				}

		}

		public function scopeId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						$query->where( 'menus.id', $id );

				}

		}

		public function scopeStatus( $query, $status )
		{

				if( trim( $status ) != '' )
				{

						$query->where( 'menus.status', $status );

				}

		}

		public function scopeSelectValues( $query, $where = array(), $isNull = array(), $isNotNull = array() )
		{

				if( !empty( $where ) )
				{

						$query->where( $where );

				}

				if( !empty( $isNull ) )
				{

						foreach( $isNull as $field )
						{

								$query->whereNull( $field );

						}

				}

				if( !empty( $isNotNull ) )
				{

						foreach( $isNotNull as $field )
						{

								$query->whereNotNull( $field );

						}

				}

				return $query;

		}


		// public function getIcons()
		// {
		//
		// 		function array_delete($array, $element) {
		// 					return (is_array($element)) ? array_values(array_diff($array, $element)) : array_values(array_diff($array, array($element)));
		// 		}
		// 		$icons_file = "css/font-awesome/css/font-awesome.css";
		// 		$parsed_file = file_get_contents($icons_file);
		// 		preg_match_all("/fa\-([a-zA-z0-9\-]+[^\:\.\,\s])/", $parsed_file, $matches);
		// 		$exclude_icons = array("fa-lg", "fa-2x", "fa-3x", "fa-4x", "fa-5x", "fa-ul", "fa-li", "fa-fw", "fa-border", "fa-pulse", "fa-rotate-90", "fa-rotate-180", "fa-rotate-270", "fa-spin", "fa-flip-horizontal", "fa-flip-vertical", "fa-stack", "fa-stack-1x", "fa-stack-2x", "fa-inverse");
		// 		$icons = (object) array("icons" => array_delete($matches[0], $exclude_icons));
		// 		print json_encode($icons);
		//
		// }

}
