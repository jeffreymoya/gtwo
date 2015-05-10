<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model {

	protected $fillable = ['sponsor_id', 'referral_id'];

	public function sponsor() {

		return $this->belongsTo('App\User', 'sponsor_id');
	}

	public function referral() {

		return $this->belongsTo('App\User', 'referral_id');
	}

}
