
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Jop-Update';
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
                <h2>Update Jops</h2>
                <form method="post" action="{{ route('jop.update', ['id' => $jop->id]) }}">
                    {{ csrf_field() }}
                    {{-- Start company_name --}}
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 for="company_name">Content</h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input" id="content" name="content" value="{{ $jop->content }}" required autocomplete="off">
                        </div>
                    </div>
                    {{-- End company_name --}}
                    <div class="btn-center">
                        <button type="submit" class="btn btn-success btn-block">Update Jop</button>
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
