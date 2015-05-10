<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	protected $fillable = ['line_1', 'line_2', 'city', 'country', 'postal_code'];

}
