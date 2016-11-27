@extends('layouts.app')

@section('title')
    User Profile
@endsection

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
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ Auth::user()->username }}.
					</div>
					<div class="profile-usertitle-job">

					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Address: Cairo </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Name: {{ Auth::user()->firstname }} </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-ok"></i>
                            <?php $jop = App\Jop::where('id', Auth::user()->jop_id)->first(); ?>
							Job: {{ $jop->content }} </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							UniqueCode: {{ Auth::user()->hashedcode }} </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <form method="post" action="{{ route('user.profile.update', ['id' => Auth::user()->id]) }}">
                        <h3>Edit Profile</h3>
                        <hr>
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" value="{{ Auth::user()->username }}">
                            </div>
                            <div class="form-group">
                                <label for="firstname">firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname" value="{{ Auth::user()->firstname }}">
                            </div>
                            <div class="form-group">
                                <label for="lastname">lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname" value="{{ Auth::user()->lastname }}">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" value="{{ Auth::user()->password }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="age">age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="age" value="{{ Auth::user()->age }}">
                            </div>
                            <div class="form-group">
                                <label for="jop_id">Job</label>
                                <select class="js-example-data-array form-control" name="jop_id">
                                    @foreach (App\Jop::all() as $jop)
                                        <option value="{{ $jop->id }}" {{ Auth::user()->jop_id == $jop->id ? 'selected' : ''}}>{{ $jop->content }}</option>
                                    @endforeach
                                </select>
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

@section('scripts')
    <script type="text/javascript">
        $(".js-example-data-array").select2({
            placeholder: "Select a Jop Title",
        });
    </script>
@endsection
