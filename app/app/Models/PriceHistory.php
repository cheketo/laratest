<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{

    protected $table = 'price_history';

		protected $fillable =
		[

				'group_id', 'category_id', 'enrollment_amount', 'enrollment_price', 'fee_amount', 'fee_price'

		];

		public function group()
		{

				return $this->hasOne( 'App\Models\CareerGroup', 'id', 'group_id' );

		}

		public function category()
		{

				return $this->hasOne( 'App\Models\StudentCategory', 'id', 'category_id' );

		}

		public function user()
		{

				return $this->hasOne( 'App\Models\User', 'id', 'user_id' );

		}

		// Scopes
		public function scopeEnrollmentAmount( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'price_history.enrollment_amount', '=', $amount );

				}

		}

		public function scopeEnrollmentAmountMoreThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'price_history.enrollment_amount', '>', $amount );

				}

		}

		public function scopeEnrollmentAmountLessThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'price_history.enrollment_amount', '<', $amount );

				}

		}

		public function scopeFeeAmount( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'price_history.fee_amount', '=', $amount );

				}

		}

		public function scopeFeeAmountMoreThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'price_history.fee_amount', '>', $amount );

				}

		}

		public function scopeFeeAmountLessThan( $query, $amount )
		{

				if( intval( $amount ) > 0 )
				{

						$query->where( 'price_history.fee_amount', '<', $amount );

				}

		}

		public function scopeEnrollmentPrice( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'price_history.enrollment_price', '=', $price );

				}

		}

		public function scopeEnrollmentPriceMoreThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'price_history.enrollment_price', '>', $price );

				}

		}

		public function scopeEnrollmentPriceLessThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'price_history.enrollment_price', '<', $price );

				}

		}

		public function scopeFeePrice( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'price_history.fee_price', '=', $price );

				}

		}

		public function scopeFeePriceMoreThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'price_history.fee_price', '>', $price );

				}

		}

		public function scopeFeePriceLessThan( $query, $price )
		{

				if( floatval( $price ) > 0 )
				{

						$query->where( 'price_history.fee_price', '<', $price );

				}

		}

		public function scopeCreatedAtFrom( $query, $date )
		{

				if( $date )
				{

						if( strpos( $date, '/' ) )
						{

								$date = implode( '-', array_reverse( explode( '/', $date ) ) );

						}

						$query->where( 'price_history.created_at', '>=', $date );

				}

		}

		public function scopeCreatedAtTo( $query, $date )
		{

				if( $date )
				{

						if( strpos( $date, '/' ) )
						{

								$date = implode( '-', array_reverse( explode( '/', $date ) ) );

						}

						$query->where( 'price_history.created_at', '<=', $date );

				}

		}

		public function scopeCategoryId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						$query->where( 'price_history.category_id', $id );

				}

		}

		public function scopeGroupId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						$query->where( 'price_history.group_id', $id );

				}

		}

		public function scopeUserId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						$query->where( 'price_history.user_id', $id );

				}

		}

		public function scopeId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						$query->where( 'price_history.id', $id );

				}

		}

}
