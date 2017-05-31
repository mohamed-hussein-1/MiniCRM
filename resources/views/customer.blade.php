@extends('layouts.app')

@section('content')
<div class="container">
<h3>Customer Details</h3>
  <table class="table">
      <thead>
        <tr>

          <th>Customer Name</th>
          <th>Employee Assigned</th>
          <th>Customer Email</th>
          <th>Customer Phone</th>
        </tr>
      </thead>
      <tbody>

        <tr>

          <th>{{$customer->name}}</th>
          <th>{{$customer->employee->name}}</th>
          <th>{{$customer->email}}</th>
          <th>{{$customer->phone}}</th>
        </tr> 
    
      </tbody>
  </table>
</div>
<div class="container">
  <h3>Actions Performed For That Customer</h3>
  <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>employee</th>
          <th>type</th>
          <th>description</th>
          <th>time</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($actions as $action)
        <tr>
          <th scope="row">{{$loop->index}}</th>
          <th>{{$action->name}}</th>
          <th>{{$action->pivot->type}}</th>
          <th>{{$action->pivot->description}}</th>
          <th>{{$action->pivot->created_at->format('d M Y - H:i')}}</th>
        </tr> 
      @endforeach
      </tbody>
</table>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adding Action</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add-action') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description"required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                          
                            <label for="action" class="col-md-4 control-label">Employee Assigned</label>

                            <div class="col-md-6">
                                <select class="form-control" id="sel1" name="action">
                                        <option value="call">Call</option>
                                        <option value="visit">Visit</option>
                                        <option value="follow up">Follow Up</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection