<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Redirect;
use Session;
use App\Uploads;
use App\User;
use App\Glob;

class UploadsController extends Controller
{
	protected $globs;

	public function index()
	{
return view('upload.index');
	}


   public function __construct()
    {
        $this->middleware('auth');
    }

	public function multiple_upload(Request $request)
	{
		$files = input::file('images');
		$file_count = count($files);
		$uploadcount=0;
		dump($files);
	foreach($files as $file) {
				// px_close('gol_auth');
			$rules=array('file'=>'required');
			$validator=Validator::make(array('file'=>$file), $rules);
			if($validator->passes()){
				$destinationPath='uploads';
				$filename=$file->getClientOriginalName();
				$upload_success=$file->move($destinationPath, $filename);
				$uploadcount++;

				//save into datebase
				$extension = $file->getClientOriginalExtension();
				$entry=new Uploads();
				$entry->mime=$file->getClientMimeType();
				$entry->original_filename=$filename;
				$entry->filename=$file-> getFilename().'.'.$extension;
				$entry->glob_id=Glob::find($request['id']);
				$entry->save();

			}
}
		if($uploadcount==$file_count)
		{
			Session::flash('success', 'УУУУ Работает');
			return Redirect::to('upload');
		}
		else
		 {
		 	Session::flash('success', 'Ничего не загружено');
		 		return Redirect::to('upload')->withInput()->withError($validator);
		}
	}


// 	public function showallPictures(){

// $this->files=DB::table('upload')->select('*')->orderBy('created_at', 'desc')->get();
// return view('upload')->with([
// 'upload'=>$this->files
// ]);

// }
    }
