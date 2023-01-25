<!DOCTYPE html>
<html>
  <head>
    <title>information</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
  </head>
  <body>
    <br />
    <div class="container">
      <div class="card">
        <div class="card-header text-center"><h2>STUDENT INFORMATION</h2></div>
        <div class="card-btn d-flex justify-content-center">
            <button id="asending" class="btn btn-primary mx-4 mt-3">Ascending order </button>
            <button id="decending" class="btn btn-primary mx-4 mt-3">Decending order </button>
        </div>
        <div class="card-body">
          <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
          </div>
          <div class="table-responsive" id="dynamic_content">   
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
   $(document).ready(function(){
load_data(1);

function load_data(page, query = '')
{
  $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{page:page, query:query},
    success:function(data)
    {
      $('#dynamic_content').html(data);
    }
  });
}

$(document).on('click', '.page-link', function(){
  var page = $(this).data('page_number');
  var query = $('#search_box').val();
  load_data(page, query);
});

$('#search_box').keyup(function(){
  var query = $('#search_box').val();
  load_data(1, query);
});

});

  $(document).on('click', '#asending', function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });

  // decending
  $(document).on('click', '#decending', function(){

load_data(1);

function load_data(page, query = '')
{
  $.ajax({
    url:"decending_data_fetch.php",
    method:"POST",
    data:{page:page, query:query},
    success:function(data)
    {
      $('#dynamic_content').html(data);
    }
  });
}

$(document).on('click', '.page-link', function(){
  var page = $(this).data('page_number');
  var query = $('#search_box').val();
  load_data(page, query);
});

$('#search_box').keyup(function(){
  var query = $('#search_box').val();
  load_data(1, query);
});

});
</script>
