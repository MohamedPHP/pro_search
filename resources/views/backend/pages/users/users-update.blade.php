
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = '';
    ?>
    {{ $pagename }}
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap.min.css')}}" media="screen" title="no title">
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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Update User " {{ $user->username }} "</h2>
                <form method="post" action="{{ route('user.update', ['id' => $user->id]) }}">
                    {{ csrf_field() }}
                    {{-- Start Username --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="Username">Username</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="Username" name="Username" value="{{ $user->username }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End Username --}}
                    {{-- Start firstname --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="firstname">firstname</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="firstname" name="firstname" value="{{ $user->firstname }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End firstname --}}
                    {{-- Start lastname --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="lastname">lastname</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="lastname" name="lastname" value="{{ $user->lastname }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End lastname --}}
                    {{-- Start password --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="password">password</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control input" id="password" name="password" value="{{ $user->password }}" required autocomplete="off">
                            <p class="help-block text-danger">Leave IT IF You Don't Want To Change.</p>
                        </div>

                    </div>
                    {{-- End password --}}
                    {{-- Start phone --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="phone">phone</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="phone" name="phone" value="{{ $user->phone }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End phone --}}
                    {{-- Start email --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="email">email</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control input" id="email" name="email" value="{{ $user->email }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End email --}}
                    {{-- Start age --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="age">age</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control input" id="age" name="age" value="{{ $user->age }}" required autocomplete="off">
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
                                <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Male</option>
                                <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Female</option>
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
                                    <option value="{{$jop->id}}" {{ $user->jop_id == $jop->id ? 'selected' : '' }}>{{$jop->content}}</option>
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

    <script src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
    	$('#table').dataTable();
    </script>
@endsection
