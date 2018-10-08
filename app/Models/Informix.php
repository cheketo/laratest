<?php

namespace App\Models;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Informix extends Model
{

		public static function call( $name, $arrayOfKeyValues = array() )
		{

				$dbh = new PDO ( "informix:host=10.1.1.14;service=1523;database=siu_grado_cap2;server=ol_informix1170;protocol=onsoctcp", "dba", "dba" );

				$sql = "EXECUTE PROCEDURE dba." . $name . "(";  // call stored procedure by argument $name

				$arguments = implode( "', '", $arrayOfKeyValues );

				$arguments = $arguments? "'" . $arguments . "')" : ")"; // values are merged as string

        $sql .= $arguments;

				$statement = $dbh->prepare( $sql );

				$data = array();

				if( $statement->execute() )
				{

					  while( $row = $statement->fetch() )
						{

								$data[] = $row;

						}

				}
				
				return $data;
    }

}
