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
<form method="POST" action="{{route('updateGlob')}}">
	{{ csrf_field() }}
          <input type="text" name="id" id="id" hidden value="{{ $glob->id }}">
	<div class="form-group">
		<label for="head">Заголовок</label>
		<input type="text" name="head" id="head" class="form-control" value="{{ $glob->head }}">
	</div>
		<div class="form-group">
		<label for="body">Текст</label>
		<textarea type="text" name="body" id="body" class="form-control" >{{ $glob->body }}</textarea> 
	</div>
    <div class="form-group">
        <label for="photo">Картинки</label>
        <img type="photo" name="photo" id="photo" class="form-control"></img> 
    </div>
 <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>

          
                            </div>
                        </div>
</form>

@endguest
</div>
</div>
</div>
</div>
</div>
@endsection