@extends('layouts.app')

@section('content')

<div class="container" id="menu">
    <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Create post</div>

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
    <div class="alert-box success">

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
{!! Form::submit('Submit', array('class'=>'btn btn-lg btn-primary col-md-4 ')) !!}
{!! Form::close() !!}
</div>
</div>
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>

          
                            </div>
                        
@endguest
</div>
</form>

</div>
</div>
</div>
</div>
@endsection