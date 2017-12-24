<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Glob;
use App\User;


class GlobController extends Controller
{
	 protected $head;
protected $photo;
    protected $body;
protected $data;
protected $globs;

//Constructor for auyhorized dude

    public function __construct()
    {
        $this->middleware('auth');
    }


//Хз чё вообще
 public function joinglobe(){

 	return view('addcontent')->with([
 		'head'=>$this->head,
 		'body'=>$this->body
 	]);
 }

 //Show post for authorized dude

public function showglob(){

$id=\Auth::user()->id;

$this->globs=DB::table('globs')->select('*')->where('user_id', $id)->orderBy('created_at')->get();

	//$globs=Glob::select(['id','head','body', 'user_id'])->where('user_id', $id)->get( );
        $results=\Auth::user()->select('*')->get();

return view('home')->with([
'globs'=>$this->globs,
'results'=>$results
]);
}

//Show all post besides authrized dude

public function showallglob(){

$this->id=User::find('id');

$this->globs=DB::table('globs')->select('*')->orderBy('created_at', 'desc')->get();
return view('welcome')->with([
'globs'=>$this->globs
]);

}

//Save post for authorized dude

 public function saveglob(Request $request){
 	$this->validate($request,[
        'head' =>'required|max:255',
        'body' =>'required|max:255'
        ]);
  $glob=new Glob();
$glob->head=$request['head'];
$glob->body=$request['body'];
$request->user()->globs()->save($glob);
return redirect('/');
}

public function getglob($id){
    $glob=Glob::find($id);
    return view('globedit')->with([
'glob'=>$glob
]);
}

public function updateglob(Request $request){
    $glob=Glob::find($request['id']);

$glob->head=$request['head'];
$glob->body=$request['body'];
$glob->save();
return redirect('/');
}

  public function globLikeGlob(Request $request){
    $glob_id=$request['globId'];
    $is_like=$request['isLike']==='true';
    $update=false;
    $glob=Glob::find($glob_id);
  
    if(!$glob){
        return null;
    }
    $user=Auth::user();
    $like=$user->likes()->where('glob_id', $glob_id)->first();

    if($like){
        $already_like = $like->like;
        $update=true;
        if($already_like == $is_like){
            $like=delete();
            return null;
        }
    }else{
        $like=new like();
    }

    $like->like=$is_like;
    $like->user_id=$user_id;
    $like->glob_id=$glob_id;

    if ($update){
        $like->update();
    }else{
        $like->save();
    }

    return null;

  }

}
