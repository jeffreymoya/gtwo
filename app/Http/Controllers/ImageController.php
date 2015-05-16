<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use Image;
use Response;

class ImageController extends Controller {

	public function deposits($id) {
		$parts = explode(".", $id);
		$order = Order::findOrFail($parts[0]);

		if (!Auth::user()->isAdmin() && Auth::user()->id != $order->user_id) {
			return response('Unauthorized request', 404);
		}

		$img = Image::make(base_path() . env('DEPOSIT_SLIP_UPLOAD_PATH') . DIRECTORY_SEPARATOR . $id);
		return $img->response();
	}

	public function product($id) {
		return $this->fetchImage($id);
	}

	public function thumb($id) {
		return $this->fetchImage($id, true);
	}

	protected function fetchImage($id, $thumb = false) {
		$file = base_path() . env('PRODUCT_IMG_UPLOAD_PATH') . DIRECTORY_SEPARATOR . $id;
		$dimension = Input::get('d');

		if (File::exists($file)) {

			$img = Image::make($file);

		} else {

			$img = Image::make(base_path() . env('NO_IMAGE'));
		}

		if ($thumb) {
			$w = 300;
			$h = 425;
			if ($dimension && strpos($dimension, "x")) {

				$d = explode("x", $dimension);
				$w = intval($d[0]) ? intval($d[0]) : $w;
				$h = intval($d[1]) ? intval($d[1]) : $h;

			}

			$img->resize($w, $h);
		}

		return $img->response();
	}

}
