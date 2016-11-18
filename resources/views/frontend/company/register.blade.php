@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="opacity: 0.7; margin-top:150px;">
                <div class="panel-heading">Register as Company</div>
                <div class="panel-body">
                    {{-- `id`, `company_name`, `address`, `email`, `business_type`,
                         `website`, `hashedcode`, `password`, `founder_date` --}}
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('company/register') }}">
                        {{ csrf_field() }}
                        {{-- Start company_name --}}
                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label for="company_name" class="col-md-4 control-label">company_name</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- End company_name --}}
                        {{-- Start address --}}
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        {{-- End address --}}
                        {{-- Start email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">email</label>

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
                        {{-- Start business_type --}}
                        <div class="form-group{{ $errors->has('business_type') ? ' has-error' : '' }}">
                            <label for="business_type" class="col-md-4 control-label">business_type</label>

                            <div class="col-md-6">
                                <input id="business_type" type="business_type" class="form-control" name="business_type" value="{{ old('business_type') }}">
                                @if ($errors->has('business_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('business_type') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        {{-- End business_type --}}
                        {{-- Start website --}}
                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}">
                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        {{-- End Username --}}
                        {{-- Start website --}}
                        <div class="form-group{{ $errors->has('founder_date') ? ' has-error' : '' }}">
                            <label for="founder_date" class="col-md-4 control-label">founder_date</label>

                            <div class="col-md-6">
                                <input id="founder_date" type="date" class="form-control" name="founder_date" value="{{ old('founder_date') }}">
                                @if ($errors->has('founder_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('founder_date') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        {{-- End founder_date --}}
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
                                <div class="eyePass">
                                  <i class="fa fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        {{-- End Password --}}
                        {{-- Start Pass Confirm --}}
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                <div class="eyePass">
                                  <i class="fa fa-eye-slash"></i>
                                </div>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var data = [{ id: "", text: 'Select a jop Title' },{ id: 1, text: 'enhancement' }, { id: 2, text: 'bug' },];
        $(".js-example-data-array").select2({
            data: data,
            placeholder: "Select a Jop Title",
        });
    </script>
@endsection
