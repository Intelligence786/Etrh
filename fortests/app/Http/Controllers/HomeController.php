<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
     protected $head;
    protected $body;
protected $data;
protected $users;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

public function search(Request $request)
{
        $name=$request->name;
       $results=\Auth::user()->select('*')->where('name','like','%'.$name.'%')->orderBy('created_at', 'desc')->get();
          return view('search')->with(['results'=>$results]);

}


public function showAllPeople(Request $request)
{
        $name=$request->name;
        $results=\Auth::user()->select('*')->orderBy('created_at', 'desc')->get();
          return view('allpeople')->with(['results'=>$results]);

}


public function showMyData(Request $request)
{
     $name=$request->name;
        $results=\Auth::user()->select('*')->get();
        dump($results);
          return view('/home')->with(['results'=>$results]);

}

}
