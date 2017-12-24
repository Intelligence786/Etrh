@extends('layouts.app')
@section('content') 

        <div class="col-md-8 col-md-offset-1">
            <div >

              
<body>
          <aside class="col-md-7">
        <ul class="list-group submenu">
          <li class="list-group-item active">Меню</li>
          <li class="list-group-item"><a href="{{ url('/') }}">Главная страница</a></li>
          <li class="list-group-item"><a href="{{url('/allpeople')}}">Люди в эфире</a></li>
          <li class="list-group-item"><a href="4.html">Фотографии</a></li>
        </ul>
        
      </aside>
      
            
 
<section class="col-md-17">
    
              <table class="table table-striped table-bordered">
  <div class="list-group-item active">Найденные люди:</div>

        <tr>
            <td>Name</td>
            <td>Last name</td>
            <td>Create date</td>
      <td>What can you do</td>
        </tr>
   
@foreach($results as $result)
   <tr>
<td>{{ $result->name }}</td>
<td>{{ $result->last_name }}</td>
<td>{{$result->created_at}}</td>
<td>

     <a class="btn btn-small btn-success" href="#">+</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="#">=</a>
</td>

</tr>
@endforeach

</table>
      
           </body>
        

@endsection
