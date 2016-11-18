
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Jops';
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
                <h3>Jops Table</h3>
                <table class="table" id="table">
                    {{-- `content` --}}
                    <thead class="text-primary">
                        <th>id</th>
                        <th>content</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($jops as $jop)
                            <tr>
                                <td>{{$jop->id}}</td>
                                <td>{{$jop->content}}</td>
                                <td>
                                    <a href="{{ route('jop-get-update', ['id' => $jop->id]) }}" class="btn-sm btn-success"><i class="fa fa-crop" aria-hidden="true"></i></a>
                                    <a href="{{ route('jop.delete', ['id' => $jop->id]) }}" class="btn-sm btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></a>
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
