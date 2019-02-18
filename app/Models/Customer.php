<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function company()
    {

        return $this->hasOne( 'App\Models\Company', 'id', 'company_id' );

    }

}
