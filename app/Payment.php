<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	protected $fillable = ['type', 'deposit_slip_image', 'deposit_reference_no'];

	public function order() {

		return $this->belongsTo('App\Order');
	}

}
