<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    // Scopes

    public function scopeId( $query, $id )
		{

				if( trim( $id ) && $id > 0 )
				{

						$query->where( 'companies.id', '=', $id );

				}

		}

    public function scopeName( $query, $name )
		{

				if( trim( $name ) )
				{

						$query->where( 'companies.name', 'LIKE', '%' . $name . '%' );

				}

		}

    public function scopeStatus( $query, $status )
		{

				if( trim( $status ) )
				{

						$query->where( 'companies.status', '=', $status );

				}

		}

}
