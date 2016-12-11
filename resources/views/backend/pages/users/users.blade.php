
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Users';
    ?>
    {{ $pagename }}
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap.min.css')}}" media="screen" title="no title">

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card-content table-responsive">
                <h3>Users Table</h3>
                <table class="table" id="table">
                    {{-- `id`, `username`, `firstname`, `lastname`, `password`,
                    `phone`, `email`, `age`, `gender`, `hashedcode`, `jop_id`, `isadmin`--}}
                    <thead class="text-primary">
                        <th>id</th>
                        <th>username</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>age</th>
                        <th>gender</th>
                        <th>hashedcode</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->age}}</td>
                                <td class="text-primary">{{$user->gender == 0 ? 'Male' : 'Female'}}</td>
                                <td class="btn-link">{{$user->hashedcode}}</td>
                                <td>
                                    <a href="{{ route('user-get-update', ['id' => $user->id]) }}" class="btn-sm btn-success"><i class="fa fa-crop" aria-hidden="true"></i></a>
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn-sm btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
