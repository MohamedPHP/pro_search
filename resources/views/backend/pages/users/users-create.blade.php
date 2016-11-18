
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Users-Create';
    ?>
    {{ $pagename }}
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('datatables/css/datatables.bootstrap.min.css')}}" media="screen" title="no title">
<style media="screen">
    .input{
        margin-top: -30px;
        border: 1px solid #555;
        border-radius: 10px;
        padding: 10px;
    }
    .btn-center{
        width: 300px;
        margin: auto;
    }
</style>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                {{-- `id`, `username`, `firstname`, `lastname`, `password`,
                 `phone`, `email`, `age`, `gender`, `hashedcode`, `jop_id`, `isadmin`--}}
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Create Users</h2>
                <form method="post" action="{{ route('user.create') }}">
                    {{ csrf_field() }}
                    {{-- Start Username --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="Username">Username</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="Username" name="Username" value="{{ old('Username') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End Username --}}
                    {{-- Start firstname --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="firstname">firstname</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="firstname" name="firstname" value="{{ old('firstname') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End firstname --}}
                    {{-- Start lastname --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="lastname">lastname</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="lastname" name="lastname" value="{{ old('lastname') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End lastname --}}
                    {{-- Start password --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="password">password</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="password" name="password" value="{{ old('password') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End password --}}
                    {{-- Start phone --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="phone">phone</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End phone --}}
                    {{-- Start email --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="email">email</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control input" id="email" name="email" value="{{ old('email') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End email --}}
                    {{-- Start age --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="age">age</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control input" id="age" name="age" value="{{ old('age') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End age --}}
                    {{-- Start gender --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="gender">gender</h5>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control input" id="gender" name="gender" required>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                    {{-- End gender --}}
                    {{-- Start jop_id --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="jop_id">jop_id</h5>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control input" id="jop_id" name="jop_id" required>
                                @foreach ($jops as $jop)
                                    <option value="{{$jop->id}}">{{$jop->content}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- End jop_id --}}
                    <div class="btn-center">
                        <button type="submit" class="btn btn-success btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="{{asset('datatables/js/jquery.datatables.min.js')}}"></script>

    <script src="{{asset('datatables/js/datatables.bootstrap.min.js')}}"></script>

    <script>
    	$('#table').dataTable();
    </script>
@endsection
