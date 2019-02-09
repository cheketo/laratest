<?php

namespace App\Models\Guarani;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{

		protected $connection = 'informix';

		protected $table = 'sga_carreras';

		// protected $primaryKey = 'carrera'; //No usar el campo 'carrera' porque no funciona sino

		// Scopes

		public function scopeUnidadAcademica( $query, $ua )
		{

				if( trim( $ua ) != '' )
				{

						return $query->where( 'sga_carreras.unidad_academica', 'LIKE', '%' . $ua . '%' );

				}

		}

		public function scopeCarrera( $query, $carrera )
		{

				if( trim( $carrera ) != '' )
				{

						return $query->where( 'sga_carreras.carrera', 'LIKE', '%' . $carrera . '%' );

				}

		}

		public function scopeNombre( $query, $nombre )
		{

				if( trim( $nombre ) != '' )
				{

						return $query->where( 'sga_carreras.nombre', 'LIKE', '%' . $nombre . '%' );

				}

		}

		public function scopeNombreReducido( $query, $nombreReducido )
		{

				if( trim( $nombreReducido ) != '' )
				{

						return $query->where( 'sga_carreras.nombre_reducido', 'LIKE', '%' . $nombreReducido . '%' );

				}

		}

		public function scopeDepartamento( $query, $departamento )
		{

				if( trim( $departamento ) != '' )
				{

						return $query->where( 'sga_carreras.departamento', 'LIKE', '%' . $departamento . '%' );

				}

		}

		public function scopePlanVigente( $query, $planVigente )
		{

				if( trim( $planVigente ) != '' )
				{

						return $query->where( 'sga_carreras.plan_vigentes', 'LIKE', '%' . $planVigente . '%' );

				}

		}

		public function scopeTipoDeCarrera( $query, $tipoDeCarrera )
		{

				if( trim( $tipoDeCarrera ) != '' )
				{

						return $query->where( 'sga_carreras.tipo_de_carrera', 'LIKE', '%' . $tipoDeCarrera . '%' );

				}

		}

		public function scopeCursoIngreso( $query, $cursoIngreso )
		{

				if( trim( $cursoIngreso ) != '' )
				{

						return $query->where( 'sga_carreras.curso_ingreso', 'LIKE', '%' . $cursoIngreso . '%' );

				}

		}

		public function scopeTermino( $query, $termino )
		{

				if( trim( $termino ) != '' )
				{

						return $query->where( 'sga_carreras.termino', 'LIKE', '%' . $termino . '%' );

				}

		}

		public function scopeFechaCreacion( $query, $fechaCreacion )
		{

				if( trim( $fechaCreacion ) != '' )
				{

						return $query->where( 'sga_carreras.fecha_creacion', 'LIKE', '%' . $fechaCreacion . '%' );

				}

		}

		public function scopeNroResolucion( $query, $nroResolucion )
		{

				if( trim( $nroResolucion ) != '' )
				{

						return $query->where( 'sga_carreras.nro_resolucion', 'LIKE', '%' . $nroResolucion . '%' );

				}

		}

		public function scopeFechaBaja( $query, $fechaBaja )
		{

				if( trim( $fechaBaja ) != '' )
				{

						return $query->where( 'sga_carreras.fecha_baja', 'LIKE', '%' . $fechaBaja . '%' );

				}

		}

		public function scopeResolucionBaja( $query, $resolucionBaja )
		{

				if( trim( $resolucionBaja ) != '' )
				{

						return $query->where( 'sga_carreras.resolucion_baja', 'LIKE', '%' . $resolucionBaja . '%' );

				}

		}

		public function scopeEstado( $query, $estado )
		{

				if( trim( $estado ) != '' )
				{

						return $query->where( 'sga_carreras.estado', 'LIKE', '%' . $estado . '%' );

				}

		}

}
