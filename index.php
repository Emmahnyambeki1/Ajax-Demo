<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
<div class="row justify-content-center">
    <div class="col-md-6 col-sm-3 col-12">
    
    <div class="card">
    <div class="card-header">Test submit Ajax</div>
    <div class="card-body">
        <form  method="post" id="ajaxDemo">
        <div class="form-group">
        <label for="username">Enter username: </label>
        <input type="text" name="username" id="username">
        </div>
        <button type="submit" class="btn shadow btn-outline-success">Submit</button>
        </form>
    </div>
    <div class="card-footer">
    
    </div>
</div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> 
<script>
$(function(){


    $('#ajaxDemo').on('submit', function(e){

        e.preventDefault();

    $.ajax({
        url: 'save.php',
        type: 'POST',
        dataType: 'json',
        cache: 'false',
        data: $('#ajaxDemo').serializeArray(),
        success: function(response){
            if (response.success) {
            $('.card-body').append('<div class="alert alert-success">'+response.success+'</div>')
                
            } else if(response.error) {
             $('.card-body').append('<div class="alert alert-danger">'+response.error+'</div>')
                
            }

            $('div.alert').delay(3000).fadeOut(350);

            },
        error: function(err){
            $('.card-body').append('<div class="alert alert-danger">'+err.statusText+'</div>')
            $('div.alert').delay(3000).fadeOut(350);


        }
    });

    });

    

   
});
</script>
</body>
</html>