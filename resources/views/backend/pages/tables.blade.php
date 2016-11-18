
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Tables';
    ?>
    {{ $pagename }}
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('datatables/css/datatables.bootstrap.min.css')}}" media="screen" title="no title">

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">

            <div class="card-content table-responsive">
                <table class="table" id="table">
                    <thead class="text-primary">
                        <th>Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Salary</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dakota Rice</td>
                            <td>Niger</td>
                            <td>Oud-Turnhout</td>
                            <td class="text-primary">$36,738</td>
                        </tr>
                        <tr>
                            <td>Minerva Hooper</td>
                            <td>Curaçao</td>
                            <td>Sinaai-Waas</td>
                            <td class="text-primary">$23,789</td>
                        </tr>
                        <tr>
                            <td>Sage Rodriguez</td>
                            <td>Netherlands</td>
                            <td>Baileux</td>
                            <td class="text-primary">$56,142</td>
                        </tr>
                        <tr>
                            <td>Philip Chaney</td>
                            <td>Korea, South</td>
                            <td>Overland Park</td>
                            <td class="text-primary">$38,735</td>
                        </tr>
                        <tr>
                            <td>Doris Greene</td>
                            <td>Malawi</td>
                            <td>Feldkirchen in Kärnten</td>
                            <td class="text-primary">$63,542</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
                        <tr>
                            <td>Mason Porter</td>
                            <td>Chile</td>
                            <td>Gloucester</td>
                            <td class="text-primary">$78,615</td>
                        </tr>
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
