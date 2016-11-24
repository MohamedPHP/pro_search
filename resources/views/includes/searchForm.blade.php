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
               <select class="form-control transparent-select hidden" style="width: auto;margin-top: -1px;" name="fillter" id="fillter">
               </select>
          </div><!-- /btn-group -->
          <div class="form-group">
            <label class="sr-only" for="search">Email address</label>
            <input type="text" class="form-control searchBox transparent" name="search" placeholder="Search ..." id="search" required autocomplete="off">
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
