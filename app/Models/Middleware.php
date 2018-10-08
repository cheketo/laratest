<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Middleware extends Model
{
		protected $fillable = [

				'name', 'object'

		];

		public function routes()
		{

				return $this->belongsToMany( 'App\Models\WebRoute', 'middleware_route', 'middleware_id', 'route_id' )->withTimestamps();

		}

		public function getClass()
		{

				return '\Illuminate\Auth\Middleware\\' . $this->class;

		}

}
