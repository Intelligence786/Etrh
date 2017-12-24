@extends('layouts.app')
@section('content') 

        <div class="col-md-8 col-md-offset-1">
            <div >

              
<body>
   <div>Ваши Данные:</div>
@foreach($results as $result)
@if($result->id === Auth::user()->id)
<ul class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
     <li class="list-group-item-action">Full Name: {{ $result->name }} {{ $result->last_name }}</li>
          </div>
    <li class="list-group-item">Gender: {{ $result->gender }}</p>
    <p>Date born: {{ $result->dirthdate_day}} {{ $result->dirthdate_month}} {{ $result->dirthdate_year}}</p>
    <p>Email: {{ $result->email }}</p>

    <small>Дата создания аккаунта - {{ $result->created_at}}</small>
  </a>
  </ul>
@else
@endif
@endforeach
    <div id="ourter">

    <div id="content">
        
             <div class="menu">
<ul>
<li><a href="{{ url('/') }}">Главная страница</a></li>
 <li><a href="{{url ('/allpeople')}}">Люди в эфире</a></li>
   <div class="line"></div>
  <li><a href="4.html">Фотографии</a></li>
  </ul>

  </div>
       <div id="container">
            <div class="col-md-4 control-label">

 

        </div>

      </div>
            
            <div class="xbg"></div>



        </div>
<!-- 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> -->
    
        </div>
        </div>
        <div id="container">
            <div class="col-md-4 control-label">
  <div>Ваши посты:</div>

@foreach($globs as $glob)
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
     <h2>{{ $glob->head }}</h2>
          </div>
    <p>{{ $glob->body }}</p>
    <small>Дата создания - {{ $glob->created_at}}</small>
  </a>
  <a class="btn btn-default" href="{{ url('/edit', ['id'=>$glob->id]) }}" role="button">Изменить </a>
<a>
  <p><a class="btn btn-default" href="{{ route('globShow', ['id'=>$glob->id]) }}" role="button">Подробнее</a></p>
<form action="{{ route('globDelete', ['glob'=>$glob->id]) }}" method="post">
  
<!-- <input type="hidden" name="_method" value="DELETE"> -->

{{ method_field('DELETE') }}

{{ csrf_field() }}

  <button type="submit" class="btn btn-danger">
    
    Delete

  </button>
</form>
  </div>

@endforeach
 

        </div>

      </div>
           </body>
              </div>
                 </div>
    </form>

@endsection
