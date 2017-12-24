@extends('layouts.app')
@section('content') 

        <div class="col-md-8 col-md-offset-1">
            <div >

              
<body>
        <div id="container">
            <div class="col-md-4 control-label">
  <div>Люди в Эфире:</div>
<table class="table table-striped table-bordered">
  <thead>
        <tr>
            <td>Name</td>
            <td>Last name</td>
            <td>Create date</td>
      
        </tr>
    </thead>
        <tbody>
@foreach($results as $result)
@if($result->id === Auth::user()->id)
@else

<tr>
    <td> {{ $result->name }}</td>
    <td>{{ $result->last_name }}</td>
    <td>{{ $result->created_at}}</td>
    <td>

     <a class="btn btn-small btn-success" href="#">+</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="#">=</a>
</td>

</tr>
@endif
@endforeach
</tbody>
 
</table>
        </div>

      </div>
           </body>
              </div>
                 </div>
    </form>

@endsection
