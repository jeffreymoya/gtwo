<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $fillable = ['user_id', 'role_id', 'iexp4u_id', 'first_name', 'last_name', 'payment_id', 'address_id', 'phone', 'uploaded_id', 'password'];

	//
	public function user() {

		return $this->belongsTo('App\User');
	}

	public function product() {

		return $this->belongsTo('App\Product');
	}

	public function payment() {

		return $this->belongsTo('App\Payment');
	}
}
