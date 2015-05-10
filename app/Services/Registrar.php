<?php namespace App\Services;

use App\User;
use App\Referral;
use App\Address;
use Validator;
use Request;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'user_id' => 'required|email|max:255|unique:users',
			'sponsor_id' => 'required|email|max:255|exists:users,user_id',
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'line_1' => 'required',
			'city' => 'required',
			'country' => 'required',
			'postal_code' => 'required',
			'phone' => 'required',
			'uploaded_id' => 'required',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$address = Address::create([
			'line_1'=>$data['line_1'],
			'line_2'=>$data['line_2'],
			'city'=>$data['city'],
			'country'=>$data['country'],
			'postal_code'=>$data['postal_code']
			]);

		$user = User::create([
			'user_id' => $data['user_id'],
			'role_id' => 1,
			'iexp4u_id' => $data['iexp4u_id'],
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'address_id' => $address->id,
			'phone' => $data['phone'],
			'uploaded_id' => $data['uploaded_id'],
			'password' => bcrypt($data['password']),
		]);

		$idImg = Request::file('uploaded_id');

		$imageName = join('-',[$user->first_name, $user->last_name, $user->id]) . '.' .	 $idImg->getClientOriginalExtension();

		$idImg->move(base_path() . env('ID_IMAGE_UPLOAD_PATH'), $imageName);

		$user->uploaded_id = $imageName;

		$user->save();

		$sponsor = User::where('user_id','=',$data['sponsor_id'])->first();

		Referral::create(['sponsor_id'=>$sponsor->id, 'referral_id'=>$user->id, 'location'=>$data['location']]);

		return $user;
	}

}
