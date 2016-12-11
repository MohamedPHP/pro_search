
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'CompaniesData-CreateEntry';
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
                <form method="post" action="{{ route('companiesdata.create.DataEntry') }}">
                    {{ csrf_field() }}
                    {{-- Start company_name --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="name">name</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="name" name="name" autocomplete="off">
                        </div>
                    </div>
                    {{-- End company_name --}}
                    {{-- Start email --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="email">email</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control input" id="email" name="email" autocomplete="off">
                        </div>
                    </div>
                    {{-- End email --}}
                    {{-- Start address --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="address">address</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="address" name="address" autocomplete="off">
                        </div>
                    </div>
                    {{-- End address --}}
                    {{-- Start business_type --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="business_type">business_type</h5>
                        </div>
                        <div class="col-md-4">
                            {{-- <input type="text" class="form-control input" id="business_type" name="business_type" value="{{ $company->business_type }}" required autocomplete="off"> --}}
                            <select class="form-control input" id="business_type" name="business_type">
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
                            <input type="url" class="form-control input" id="website" name="website" autocomplete="off">
                        </div>
                    </div>
                    {{-- End website --}}
                    {{-- Start phones --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="phones">phones</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="phones" name="phones" autocomplete="off">
                            <strong class="help-block" style="color:#f00;">Add " - " Between Each Phone</strong>
                        </div>
                    </div>
                    {{-- End phones --}}
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
