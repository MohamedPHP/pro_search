
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'BussnessTypes-Create';
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
                <h2>Create Bussness Types</h2>
                <form method="post" action="{{ route('bussnesstypes.create') }}">
                    {{ csrf_field() }}
                    {{-- Start content --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="bussness_type">Bussness Type</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="bussness_type" name="bussness_type" value="{{ old('bussness_type') }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End content --}}
                    <div class="btn-center">
                        <button type="submit" class="btn btn-success btn-block">Create Bussness Type</button>
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
