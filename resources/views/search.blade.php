@extends('layouts.search')

@section('title')
    profSearch | Search Page
@endsection
@section('content')
     <h1 class="logo cursive">
          ProfSearch
          <h4 class="motto text-capitalize">Find people Wasn't easy As Now.</h4>
     </h1>
     <div class="row">
          <div class="col-md-4 col-md-offset-3 col-sm6-6 col-sm-offset-2 ">
               @include('includes.searchForm')
          </div>

          <div class="col-md-6 col-md-offset-3" style="z-index: 1;">
               @if (!empty($searchResults))
                    @if(count($searchResults) > 0)
                         @foreach($searchResults as $result)
                              <div class="searchresult">
                                   <div class="row">
                                        <div class="col-md-9">
                                             <h4><i class="fa fa-user"></i> Name: {{ $result->firstname }} {{ $result->lastname }}</h4>
                                             @if ($result->phone)
                                                  <h5><i class="fa fa-phone"></i> Phone No: {{ $result->phone }}</h5>
                                             @endif
                                             @if ($result->email)
                                                  <h5><i class="fa fa-envelope"></i> Email: {{ $result->email }}</h5>
                                             @endif
                                             @if (\App\Jop::where('id', $result->jop_id)->first())
                                                  <h5><i class="fa fa-briefcase"></i> Job: {{ \App\Jop::where('id', $result->jop_id)->first()->content }}</h5>
                                             @endif
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    @endif
               @endif
               @if (!empty($searchResultsCompany))
                    @if(count($searchResultsCompany) > 0)
                         @foreach($searchResultsCompany as $result)
                              <div class="searchresult">
                                   <div class="row">
                                        <div class="col-md-9">
                                             <h4><i class="fa fa-user"></i> Name: {{ $result->company_name }}</h4>
                                             @if ($result->email)
                                                  <h5><i class="fa fa-envelope"></i> Email: {{ $result->email }}</h5>
                                             @endif
                                             @if ($result->business_type)
                                                  <h5><i class="fa fa-briefcase"></i> Bussness Type: {{ \App\BussnessType::where('id', $result->business_type)->first()->bussness_type }}</h5>
                                             @endif
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    @endif
               @endif
          </div>






@endsection
