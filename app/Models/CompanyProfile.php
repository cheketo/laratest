<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{

    // Scopes

    public function scopeId( $query, $id )
    {

        if( trim( $id ) && $id > 0 )
        {

            $query->where( 'company_profiles.id', '=', $id );

        }

    }

    public function scopeName( $query, $name )
    {

        if( trim( $name ) )
        {

            $query->where( 'company_profiles.name', 'LIKE', '%' . $name . '%' );

        }

    }

    public function scopeStatus( $query, $status )
    {

        if( trim( $status ) )
        {

            $query->where( 'company_profiles.status', '=', $status );

        }

    }

}
