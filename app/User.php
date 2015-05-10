<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'user_id', 'role_id', 'address_id', 'phone', 'iexp4u_id', 'uploaded_id', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function isAdmin() {

		return $this->role_id === 2;
	}

	public function hasDiscount() {
		
		return !empty($this->iexp4u_id);
	}

	public function addresses() {

		return $this->hasMany('App\Address');
	}

	public function orders() {
		return $this->hasMany('App\Order');
	}

	public function getCommission() {
		$orders = $this->orders;
		$total = 0;
		foreach ($orders as $order) {
			if($order->commission !== null && $order->status === 1) {
				$total = $total + $order->commission;
			}
		}
		return $total;
	}

	public function role() {

		return $this->hasOne('App\Role');
	}

	public function referrals() {

		return $this->hasMany('App\Referral', 'sponsor_id');
	}

}
