<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Price extends Model
{

		protected $table = 'prices';

		protected $fillable =
		[

				'group_id', 'category_id', 'enrollment_amount', 'enrollment_price', 'fee_amount', 'fee_price'

		];

		protected function setKeysForSaveQuery( Builder $query )
    {

        $query->where( 'group_id', '=', $this->getAttribute( 'group_id' ) )
        		->where( 'category_id', '=', $this->getAttribute( 'category_id' ) );

        return $query;

    }


		public function group()
		{

				return $this->hasOne( 'App\Models\CareerGroup', 'id', 'group_id' );

		}

		public function category()
		{

				return $this->hasOne( 'App\Models\StudentCategory', 'id', 'category_id' );

		}

		// Scopes
		public function scopeEnrollmentAmount( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'prices.enrollment_amount', '=', $amount );

				}

		}

		public function scopeEnrollmentAmountMoreThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'prices.enrollment_amount', '>', $amount );

				}

		}

		public function scopeEnrollmentAmountLessThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'prices.enrollment_amount', '<', $amount );

				}

		}

		public function scopeFeeAmount( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'prices.fee_amount', '=', $amount );

				}

		}

		public function scopeFeeAmountMoreThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'prices.fee_amount', '>', $amount );

				}

		}

		public function scopeFeeAmountLessThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'prices.fee_amount', '<', $amount );

				}

		}

		public function scopeEnrollmentPrice( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'prices.enrollment_price', '=', $price );

				}

		}

		public function scopeEnrollmentPriceMoreThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'prices.enrollment_price', '>', $price );

				}

		}

		public function scopeEnrollmentPriceLessThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'prices.enrollment_price', '<', $price );

				}

		}

		public function scopeFeePrice( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'prices.fee_price', '=', $price );

				}

		}

		public function scopeFeePriceMoreThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'prices.fee_price', '>', $price );

				}

		}

		public function scopeFeePriceLessThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'prices.fee_price', '<', $price );

				}

		}

		public function scopeCategoryId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						$query->where( 'prices.category_id', $id );

				}

		}

		public function scopeGroupId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						$query->where( 'prices.group_id', $id );

				}

		}

}
