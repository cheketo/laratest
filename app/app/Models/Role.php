<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
    ];

    public function users()
    {

				return $this->belongsToMany( 'App\Models\User' )->withTimestamps();

    }

		public function routes()
		{

				return $this->belongsToMany( 'App\Models\WebRoute', 'role_route', 'role_id', 'route_id' )->withTimestamps();

		}

		// Scopes
		public function scopeName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						$query->where( 'roles.name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeDescription( $query, $description )
		{

				if( trim( $description ) != '' )
				{

						$query->where( 'roles.description', 'LIKE', '%' . $description . '%' );

				}

		}

		public function scopeRoute( $query, $route )
		{

				if( trim( $route ) != '' )
				{

						// $query->join( 'routes', 'routes.id', '=', 'menus.route_id' );
						//
						// $query->where( 'routes.route', 'LIKE', '%' . $route . '%' );

				}

		}

		public function scopeId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						$query->where( 'roles.id', $id );

				}

		}

		public function scopeStatus( $query, $status )
		{

				if( trim( $status ) != '' )
				{

						$query->where( 'roles.status', $status );

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

}
