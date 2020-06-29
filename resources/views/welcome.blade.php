<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Loading</title>
    </head>

    <body>
        <div style="width: 40%; margin: 0 auto">
            <p style="text-align: center;">Laravel loading spinner ajax jquery</p>
            <div style="float: left">
                <form>
                    <input type="text" name="fName" placeholder="First Name"><br>
                    <input type="text" name="lName" placeholder="Last Name"><br>
                    <button>Submit</button>
                </form>
            </div>

            <div id="users" style=" float: right;">
                <!--<img style="display: none" src="/img/loading.gif" width="70px"><br>-->
               
            </div>
        </div>


        <script>
            $.ajaxSetup({
              headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $(document).ready(function () {
            
                $.ajax({
                  type:"POST",
                  url:"/getusers",
                  beforeSend:function(){
                    $('#users').append('<img src="/img/loading.gif" width="70px">');
                  },
                  success: function(response) {
                    $('img').remove();
                    $.each(response, function( index,value ) {
                      $('#users').append("<span>"+value.fName+" "+value.lName+"<span><br>");
                    });
                  }
                });

                $(function(){
                    $("form").submit(function(e){
                        e.preventDefault();
                        $.ajax({
                            type:"POST",
                            url:"/adduser",
                            data: $('input[type=text]').serialize(),
                            beforeSend:function(){
                            $('#users').append('<img src="/img/loading.gif" width="70px">');
                            },
                            success: function(response) {
                                $('input[type=text]').val("");
                                $('img').remove();
                                $('#users').append("<span>"+response.fName+" "+response.lName+"<span><br>");
                            }
                        });
                    })
                });
            });
        </script>
        
    </body>
</html>
