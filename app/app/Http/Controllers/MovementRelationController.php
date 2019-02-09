<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MovementRelation;

class MovementRelationController extends Controller
{

  	public static function insert( $credit, $debit, $amount, $guaraniId = null )
		{

				if( $credit->student_id == $debit->student_id )
				{

						$relation = new MovementRelation();

						$relation->student_id = $credit->student_id;

						if( $guaraniId )
						{

								$relation->guarani_id = $guaraniId;

						}

						$relation->amount = $amount;

						$credit->movementRelations()->save( $relation );

						$debit->movementRelations()->save( $relation );

						$relation->created_by = auth()->user()->id;

						$relation->save();

						return $relation;

				}


		}

}
