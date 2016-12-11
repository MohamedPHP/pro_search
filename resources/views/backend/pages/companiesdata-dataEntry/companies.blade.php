
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'CompaniesDataEntry';
    ?>
    {{ $pagename }}
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('datatables/css/datatables.bootstrap.min.css')}}" media="screen" title="no title">

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
                <h3>Companies Table</h3>
                <table class="table" id="table">
                    <thead class="text-primary">
                        <th>id</th>
                        <th>company_name</th>
                        <th>email</th>
                        <th>address</th>
                        <th>phones</th>
                        <th>business_type</th>
                        <th>website</th>
                    </thead>
                    <tbody>
                        @foreach ($companydata as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->phones }}</td>
                                <?php
                                    $CompanyBussness = App\BussnessType::where('id', $company->business_type_d)->first();
                                ?>
                                <td>{{ $CompanyBussness->bussness_type }}</td>
                                <td><a href="{{ $company->website }}" class="btn-sm btn-primary">Website</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
