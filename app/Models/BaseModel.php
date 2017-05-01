<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($value)
	{
	$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(),$value);
    return $utc->setTimezone('America/Chicago');
	}

	public function setUsernameAttributes($value)
	{
	$this->attributes['username'] = strtolower($value);
	}

	public function setPasswordAttribute($value)
	{
	$this->attributes['password'] = Hash::make($value);
	}
}
