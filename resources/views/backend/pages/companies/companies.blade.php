
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Companies';
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
                    {{-- `company_name`, `address`, `email`, `business_type`, `website`, `hashedcode`, `password`, `founder_date`--}}
                    <thead class="text-primary">
                        <th>id</th>
                        <th>company_name</th>
                        <th>address</th>
                        <th>email</th>
                        <th>business_type</th>
                        <th>website</th>
                        <th>Phones</th>
                        <th>hashedcode</th>
                        <th>founder_date</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->company_name}}</td>
                                <td>{{$company->address}}</td>
                                <td>{{$company->username}}</td>
                                @php
                                    $b = App\BussnessType::find($company->business_type)->first();
                                @endphp
                                <td>{{ $b->bussness_type }}</td>
                                <td><a href="{{$company->website}}" class="btn-sm btn-primary">Website</a></td>
                                <td>{{$company->phones}}</td>
                                <td class="btn-link">{{$company->hashedcode}}</td>
                                <td>{{$company->founder_date}}</td>
                                <td>
                                    <a href="{{ route('company-get-update', ['id' => $company->id]) }}" class="btn-sm btn-success"><i class="fa fa-crop" aria-hidden="true"></i></a>
                                    <a href="{{ route('company.delete', ['id' => $company->id]) }}" class="btn-sm btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></a>
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

    <script src="{{asset('datatables/js/jquery.datatables.min.js')}}"></script>

    <script src="{{asset('datatables/js/datatables.bootstrap.min.js')}}"></script>

    <script>
    	$('#table').dataTable();
    </script>
@endsection
