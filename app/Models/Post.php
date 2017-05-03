<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $table = 'posts';

	public function user()
	{
		return $this->belongsTo('App\User', 'created_by');
	}
}
