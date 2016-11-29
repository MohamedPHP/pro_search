<form action="{{ route('search') }}" id="searchForm" method="post" class="form-inline" role="form">
  {{ csrf_field() }}

  <div class="input-group">
    <div class="input-group-btn">
      <select class="form-control transparent-select" style="width: auto;margin-top: -1px;" name="searchType" id="searchType">
        <option value="0"><a href="#">persone</a></option>
        <option value="1"><a href="#">company</a></option>
      </select>
    </div><!-- /btn-group -->
    <div class="input-group-btn">
      <select class="form-control transparent-select" style="width: auto;margin-top: -1px;" name="fillter" id="fillter">
        <option value="name"><a href="#">Name</a></option>
        <option value="phone"><a href="#">Phone Number</a></option>
        <option value="email"><a href="#">email</a></option>
        <option value="Job"><a href="#">Job</a></option>
      </select>
    </div><!-- /btn-group -->
    <div class="form-group" style="width: 242px;">
      <label class="sr-only" for="search">Email address</label>
      <input type="text" style="width:100%" class="form-control searchBox transparent" name="search" placeholder="Search ..." id="search" required autocomplete="off">
    </div>
    <span class="input-group-btn">
      <button class="btn btn-info btn-fill" type="submit" id="submit"><span class="glyphicon glyphicon-search"></span></button>
    </span>
  </div><!-- /input-group -->
</form>
<div class="results searchAjax transparent"></div>

<script>
var url = '{{ route('searchAjax') }}';
var token = '{{ csrf_token() }}';
</script>
