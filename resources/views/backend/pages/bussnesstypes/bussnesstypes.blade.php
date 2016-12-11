
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'BussnessTypes';
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
                <h3>Bussness Type Table</h3>
                <table class="table" id="table">
                    {{-- `content` --}}
                    <thead class="text-primary">
                        <th>id</th>
                        <th>content</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($bs as $b)
                            <tr>
                                <td>{{$b->id}}</td>
                                <td>{{$b->bussness_type}}</td>
                                <td>
                                    <a href="{{ route('bussnesstypes-get-update', ['id' => $b->id]) }}" class="btn-sm btn-success"><i class="fa fa-crop" aria-hidden="true"></i></a>
                                    <a href="{{ route('bussnesstypes.delete', ['id' => $b->id]) }}" class="btn-sm btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></a>
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
