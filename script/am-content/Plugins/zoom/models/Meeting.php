<?php 

namespace Amcoders\Plugin\zoom\models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
	public function users()
	{
		return $this->belongsToMany('App\User');
	}
}