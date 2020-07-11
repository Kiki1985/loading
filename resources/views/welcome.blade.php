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
        <div style="width: 50%; margin: 0 auto">
            <p style="text-align: center;">Laravel loading spinner ajax jquery</p>
            <div style="float: left">
                <form>
                    <input type="text" name="name" placeholder="Name"><br>
                    <input type="email" name="email" placeholder="Email"><br>
                    <input type="password" name="password" placeholder="Password"><br>
                    <button>Submit</button>
                </form>
            </div>

            <div id="users" style=" float: right;"></div>
        </div>


        <script>
            $.ajaxSetup({
              headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $(document).ready(function () {
            
                $.ajax({
                  type:"POST",
                  url:"/getSubscriptions",
                  beforeSend:function(){
                    $('#users').append('<div class="facebook"><div></div><div></div><div></div></div>');
                  },
                  success: function(response) {
                    $('.facebook').remove();
                    $.each(response, function( index,value ) {
                      $('#users').append("<span>"+value.name+" - "+value.email+"<span><br>");
                    });
                  }
                });

                $(function(){
                    $("form").submit(function(e){
                        e.preventDefault();
                        $.ajax({
                            type:"POST",
                            url:"/addSubscription",
                            data: $('form').serialize(),
                            beforeSend:function(){
                            $('#users').append('<div class="facebook"><div></div><div></div><div></div></div>');
                            },
                            success: function(response) {
                                $('input').val("");

                                $('.facebook').remove();
                                $('#users').append("<span>"+response.name+" - "+response.email+"<span><br>");
                            }
                        });
                    })
                });
            });
        </script>

        <style type="text/css">
            .facebook div{
                border-radius: 50%;
                margin-left:8px;
                 height:12px;
                 width:12px;
                 display:inline-block;
                 background-color: grey;
                 -webkit-animation:facebook_loader 1.3s linear infinite;
                 -moz-animation:facebook_loader 1.3s linear infinite;
                 animation:facebook_loader 1.3s linear infinite;
                 -webkit-transform:scale(0.91);
                 -moz-transform:scale(0.91);
                 transform:scale(0.91);
             }

            .facebook div:nth-child(1){
                 -webkit-animation-delay:0.39s;
                 -moz-animation-delay:0.39s;
                 animation-delay:0.39s;
            }
            .facebook div:nth-child(2){
                 -webkit-animation-delay:0.52s;
                 -moz-animation-delay:0.52s;
                 animation-delay:0.52s;
            }
            .facebook div:nth-child(3){
                 -webkit-animation-delay:0.65s;
                 -moz-animation-delay:0.65s;
                 animation-delay:0.65s;
            }

            @-webkit-keyframes facebook_loader{
     0%{
          -webkit-transform:scale(1.2);
          opacity:1
     }
     100%{
          -webkit-transform:scale(0.7);
          opacity:0.1
     }
}
@-moz-keyframes facebook_loader{
     0%{
          -moz-transform:scale(1.2);
          opacity:1
     }
     100%{
          -moz-transform:scale(0.7);
          opacity:0.1
     }
}
@keyframes facebook_loader{
     0%{
          transform:scale(1.2);
          opacity:1
     }
     100%{
          transform:scale(0.7);
          opacity:0.1
     }
}
            
        </style>
        
    </body>
</html>
