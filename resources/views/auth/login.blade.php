@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="opacity: 0.7; margin-top:150px;">
                <div class="panel-body">
                    <h2 class="text-center text-danger">Login Form</h2>
                    <hr>
                    <form method="post" action="{{ url('/login') }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-offset-3 col-md-6">

                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-offset-3 col-md-6">

                            <input id="password" type="password" class="form-control" name="password" placeholder="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="btn-group  col-md-offset-3 col-md-6">
                            <input class="btn btn-primary btn-block" type="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
