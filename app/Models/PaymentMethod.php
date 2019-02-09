<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    protected $table = 'payment_methods';

		protected $fillable =
		[

				'name', 'status'

		];

		public function payments()
		{

				return $this->hasMany( 'App\Payment', 'payment_id' );

		}

}
