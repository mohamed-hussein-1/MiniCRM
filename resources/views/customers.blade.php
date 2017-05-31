@extends('layouts.app')

@section('content')
<table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>employer</th>
        </tr>
      </thead>
      <tbody>
	      @foreach ($customers as $cust)
		  	<tr>
          
		  		<th scope="row"><a href="/show-customers/{{$cust->id}}">{{$loop->index}}</th>
		  		<th><a href="/show-customers/{{$cust->id}}">{{$cust->id}}</a></th>
		  		<th><a href="/show-customers/{{$cust->id}}">{{$cust->name}}</a></th>
		  		<th><a href="/show-customers/{{$cust->id}}">{{$cust->email}}</a></th>
		  		<th><a href="/show-customers/{{$cust->id}}">{{$cust->employee->name}}</a></th>
          
		  	</tr> 
		  @endforeach
      </tbody>
</table>
@endsection