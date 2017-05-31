@extends('layouts.app')

@section('content')


@if(Session::has('flash_message'))
    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Customer</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('assign-customer') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                          
                            <label for="employee" class="col-md-4 control-label">Employee Assigned</label>

                            <div class="col-md-6">
                                <select class="form-control" id="sel1" name="employee">
                                    @foreach ($employees as $emp)
                                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
