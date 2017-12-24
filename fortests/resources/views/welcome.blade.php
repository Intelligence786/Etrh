@extends('layouts.app')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
    Design by Free CSS Templates
    http://www.freecsstemplates.org
    Released for free under a Creative Commons Attribution 2.5 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript"></script>
<title>Etherium</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

</head>
@section('content') 
 <body>
  <div class="wrapper container">  
    <div class="row">
        <section class="row posts">
            <div class="col-md-6 col-md-offset-3">
           <div class="panel-body">
                @guest 
                <form method="get" action="{{route('register')}}">
                 <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Зарегистрируйтесь
                                </button>
                            </div>
                            <div>ИЛИ</div>
                            </form>
                               <form method="get" action="{{route('login')}}">
                 <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Авторизуйтесь
                                </button>
                            </div>
                            </form>
                             @else
                              <form method="POST" action="{{route('saveGlob')}}">
                               {{ csrf_field() }}
                               <div class="form-group">
                                 <label for="head">Заголовок</label>
                                 <input type="text" name="head" id="head" class="form-control">
                               </div>
                                 <div class="form-group">
                                 <label for="body">Текст</label>
                                 <textarea type="text" name="body" id="body" class="form-control"></textarea> 
                               </div>
                                 <div class="container">
    
                                @if(Session::has('success'))
  v                               <div class="alert-box success">
                             
                                     <h2>{!! Session::get('success') !!}</h2>
        
    </div>
@endif

<div class="form-group">
{!!Form::open(array('url'=>'upload/uploadFiles','method'=>'POST','files'=>true))!!}
{!! Form::file('images[]',array('multiple'=>true)) !!}
<p>{!! $errors->first('images') !!}</p>
@if(Session::has('error'))
    <p>{!! Session::get('error') !!}</p>
@endif
{!! Form::submit('Submit', array('class'=>'btn btn-lg btn-default col-md-4 ')) !!}
{!! Form::close() !!}
</div>
</div>
                        
@endguest
</div>
             </div>
          <div class="clear"></div>
    </section>
        
        <div class="post">
                      @foreach($globs as $glob)
                       <article class="info" data-postid="{{ $glob->id }}">
                       <div class="wall_text">{{ $glob->head }} </div>
                       <div class="post_content">{{ $glob->body }}</div>
                    <div class="info">
                    Posted by      {{$glob->created_at}}                            </div>
                        <a class="btn btn-default" href="{{ route('allglob', ['id'=>$glob->id]) }}" role="button">Подробнее</a>

                          @if(Auth::user()->id==$glob->user_id)
                        <a class="btn btn-default" href="{{ url('/edit', ['id'=>$glob->id]) }}" role="button">Изменить </a> 
                            {{ csrf_field() }}
                            @else
                              
                                <div class="interaction">
                                 <a href="#" class="like">Like</a>
                                  <a href="#" class="like">DisLike</a>
                                  </div>
                                   @endif
                                      {{ csrf_field() }}
                                      </article>
                                        @endforeach
       </div>
               
           @endsection('content')  

    </body>
      
</html>