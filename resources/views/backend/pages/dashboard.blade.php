
@extends('backend.layout.master')

@section('title')
    <?php
        $pagename = 'Dashboard';
    ?>
    {{ $pagename }}
@endsection

@section('styles')

@endsection


@section('content')
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">store</i>
            </div>
            <div class="card-content">
                <p class="category">Users</p>
                <h3 class="title">{{ count($users) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">Companies</i>
            </div>
            <div class="card-content">
                <p class="category">Companies</p>
                <h3 class="title">{{ count($companies) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">Companies Data</i>
            </div>
            <div class="card-content">
                <p class="category">Companies</p>
                <h3 class="title">{{ count($companiesData) }}</h3>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
