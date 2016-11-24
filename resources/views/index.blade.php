@extends('layouts.search')
@section('content')
	<h1 class="logo cursive">
		ProfesSearch
		<h4 class="motto text-capitalize">Find people Wasn't easy As Now.</h4>
	</h1>
	<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
	<div class="row">
		<div class="col-md-4 col-md-offset-3 col-sm-6 col-sm-offset-2 " id="place">
			@include('includes.searchForm')
		</div>
	</div>

@endsection
