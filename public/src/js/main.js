$(document).ready(function() {
    /* start the ajax search results*/
      // define the search , fillter and results elements
      var search = $('#search');
      var type = $('#searchType');
      var fillter = $('#fillter');
      var results = $('.results');
      // start send the data when the user keyup from the search box
      search.on('keyup', function() {
        $.ajax({
          method: 'GET',
          url: url,
          data: { body: search.val(), type: type.val(), fillter: fillter.val(), _token: token},

        }).done(function(msg) {
          // check if the response undifined and hide it to give more security
          if(msg['results'] === undefined || msg['results'] === ''){
            results.css('border-color', '#bce8f1');
            results.html('<div class="alert alert-info text-center" style="margin-top:20px;">Not Found</div>');
          }else{
            // view the response with json
            results.html(msg['results']);
          }
          $('.userInfo').on('mouseenter', function() {
               $(this).children('.num').slideDown(600);
               $(this).children('.email').slideDown(600);
          }).on('mouseleave', function() {
               $(this).children('.email').slideUp(600);
               $(this).children('.num').slideUp(600);
          });
        });
      });
      // start send the data when the user change the type box
      type.on('change', function() {
          var opt = '';
          fillter.html('');
          if ($(this).val() == 0 ) {
            opt += '<option value="name"><a href="#">Name</a></option>';
            opt += '<option value="phone"><a href="#">Phone Number</a></option>';
            opt += '<option value="email"><a href="#">email</a></option>';
            opt += '<option value="Job"><a href="#">Job</a></option>';
            fillter.html(opt);
          }
          if ($(this).val() == 1 ) {
            opt += '<option value="name"><a href="#">Company Name</a></option>';
            opt += '<option value="email"><a href="#">Company email</a></option>';
            opt += '<option value="Job"><a href="#">Company Bussiness</a></option>';
            fillter.html(opt);
          }
          $.ajax({
              method: 'GET',
              url: url,
              data: { body: search.val(), type: type.val(), fillter: fillter.val(), _token: token},

            }).done(function(msg) {
              // check if the response undifined and hide it to give more security
              if(msg['results'] === undefined ){
                results.html('<div class="alert alert-info text-center" style="margin-top:20px;">Not Found</div>');
              }else{
                // view the response with json
                results.html(msg['results']);
              }
            });
      });
      // start send the data when the user change the fillter box
      fillter.on('change', function() {
        $.ajax({
          method: 'GET',
          url: url,
          data: {body: search.val(), type: type.val(), fillter: fillter.val(), _token: token},

        }).done(function(msg) {
          // check if the response undifined and hide it to give more security
          if(msg['results'] === undefined ){
            results.html('<div class="alert alert-info text-center" style="margin-top:20px;">Not Found</div>');
          }else{
            // view the response with json
            results.html(msg['results']);
          }
        });
      });
    /* end the ajax search results*/
    /*start show and hide the result element*/
    search.on('keyup', function() {
      if($(this).val() !== ''){
        results.css('display', 'block');
      } else {
        results.css('display', 'none');
      }
    });
    /*end show and hide the result element*/

});
