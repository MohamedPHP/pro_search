@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="opacity: 0.7; margin-top:80px;">
                <div class="panel-body">
                    <h3 class="text-center text-primary">Register</h3>
                    <hr>
                    {{-- // `id`, `username`, `fristname`, `lastname`,
                    `password`, `phone`, `email`, `jop_id`, `age`, `gender`, `hashedcode`, --}}
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        {{-- Start Username --}}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="Username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="Username" type="text" class="form-control" name="username" value="{{ old('Username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        {{-- End Username --}}
                        {{-- Start Frist Name --}}
                        <div class="form-group{{ $errors->has('fristname') ? ' has-error' : '' }}">
                            <label for="fristname" class="col-md-4 control-label">FristName</label>

                            <div class="col-md-6">
                                <input id="fristname" type="text" class="form-control" name="fristname" value="{{ old('fristname') }}">
                                @if ($errors->has('fristname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fristname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End Frist Name --}}
                        {{-- Start Last Name --}}
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">LastName</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End Last Name --}}
                        {{-- Start email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End email --}}
                        {{-- Start Phone No --}}
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        {{-- End Phone No --}}

                        {{-- Start Jop --}}
                        <div class="form-group{{ $errors->has('jop_id') ? ' has-error' : '' }}">
                            <label for="jop_id" class="col-md-4 control-label">Jop Title</label>
                            <div class="col-md-6">
                                <select class="js-example-data-array form-control" name="jop_id">
                                    @foreach (App\Jop::all() as $jop)
                                        <option value="{{ $jop->id }}">{{ $jop->content }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jop_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jop_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End Jop --}}

                        {{-- Start Password --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End Password --}}
                        {{-- Start Pass Confirm --}}
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                <span class="badge check"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End Pass Confirm --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ url('company/register') }}" class="btn btn-link">Register As Company</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".js-example-data-array").select2({
            placeholder: "Select a Jop Title",
        });
    </script>
@endsection
