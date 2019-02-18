<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{

    // Scopes

    public function scopeId( $query, $id )
		{

				if( trim( $id ) && $id > 0 )
				{

						$query->where( 'company_types.id', '=', $id );

				}

		}

    public function scopeName( $query, $name )
		{

				if( trim( $name ) )
				{

						$query->where( 'company_types.name', 'LIKE', '%' . $name . '%' );

				}

		}

    public function scopeStatus( $query, $status )
		{

				if( trim( $status ) )
				{

						$query->where( 'company_types.status', '=', $status );

				}

		}

}
