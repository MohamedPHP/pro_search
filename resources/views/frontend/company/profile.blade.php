@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('src/css/profile.css') }}" media="screen" title="no title">
    <style media="screen">
        .wrapper{
            margin-top: 150px;
        }
        label{
            color: #777;
        }
    </style>
@endsection

@section('content')
<div class="container wrapper">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://placehold.it/100/100" class="img-responsive" alt="">
				</div>
                {{-- `id`, `company_name`, `address`, `username`, `business_type`, `website`, `hashedcode`, `password`, `founder_date` --}}
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $company->company_name }}
					</div>
					<div class="profile-usertitle-job">
						{{ $company->business_type }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							{{ $company->username }} </a>
						</li>
						<li>
							<a href="{{ $company->website }}">
							<i class="glyphicon glyphicon-user"></i>
							Website </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-ok"></i>
							{{ $company->address }} </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							{{ $company->hashedcode }} </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <form method="post" action="{{ route('company.profile.update', ['id' => $company->id]) }}">
                        <h3>Edit Profile</h3>
                        <hr>
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Username">company_name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="company_name" value="{{ $company->company_name }}">
                            </div>
                            <div class="form-group">
                                <label for="firstname">address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ $company->address }}">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Email</label>
                                <input type="email" class="form-control" id="username" name="username" placeholder="username" value="{{ $company->username }}">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ $company->password }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">website</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="website" value="{{ $company->website }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">business_type</label>
                                <input type="text" class="form-control" id="business_type" name="business_type" placeholder="business_type" value="{{ $company->business_type }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">founder_date</label>
                                <input type="date" class="form-control" id="founder_date" name="founder_date" placeholder="founder_date" value="{{ $company->founder_date }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-block">Edit Profile</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
