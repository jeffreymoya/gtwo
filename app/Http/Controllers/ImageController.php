<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Image;

use Illuminate\Http\Request;

class ImageController extends Controller {

	public function deposits($id)
	{

		$img = Image::make(base_path() .env('DEPOSIT_SLIP_UPLOAD_PATH') . DIRECTORY_SEPARATOR . $id);
return $img->response();
	}


}
