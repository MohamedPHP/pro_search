
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Companies-Create';
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
                {{-- `company_name`, `address`, `email`, `business_type`, `website`, `hashedcode`, `password`, `founder_date`--}}
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
                <h2>Create Companies</h2>
                <form method="post" action="{{ route('company.create') }}">
                    {{ csrf_field() }}
                    {{-- Start company_name --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="company_name">company_name</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="company_name" name="company_name" value="{{ old('company_name') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End company_name --}}
                    {{-- Start address --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="address">address</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="address" name="address" value="{{ old('address') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End address --}}
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
                    {{-- Start business_type --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="business_type">business_type</h5>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control input" id="business_type" name="business_type" required>
                                @foreach (App\BussnessType::all() as $b)
                                    <option value="{{$b->id}}">{{$b->bussness_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- End business_type --}}
                    {{-- Start website --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="website">website</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="url" class="form-control input" id="website" name="website" value="{{ old('website') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End website --}}
                    {{-- Start password --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="password">password</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control input" id="password" name="password" value="{{ old('password') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End password --}}
                    {{-- Start password_confirmation --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="password_confirmation">password_confirmation</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="password" class="form-control input" id="password_confirmation" name="password_confirmation" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End password_confirmation --}}
                    {{-- Start founder_date --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="founder_date">founder_date</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control input" id="founder_date" name="founder_date" value="{{ old('founder_date') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End founder_date --}}
                    <div class="btn-center">
                        <button type="submit" class="btn btn-success btn-block">Create Company</button>
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
