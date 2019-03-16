<!DOCTYPE html>
    <html>
    <title>Profile</title>
        <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
            .container{
                margin-top: 1%; 
            }
            .buttons{
                width: 100%;
                margin: 5%;
                justify-content: space-between;
            }
            #goOut{
                margin-left: 50%;
            }
           
        </style>
        </head>
              

    <body>
            
            

            <div class="form-horizontal notactive">
                    <fieldset>
                        <form action = "{{route('updateProfile',[auth()->user()->id])}}" method = "post">
                        {{csrf_field()}}



                    <legend>Change Password</legend>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piCurrPass">Old Password</label>
                    <div class="col-md-4">
                        <input id="piCurrPass" name="piCurrPass" type="password" placeholder="" class="form-control input-md" required="">
                    </div>
                    </div>
                
                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piNewPass">New Password</label>
                    <div class="col-md-4">
                        <input id="piNewPass" name="password" type="password" placeholder="" class="form-control input-md" required="">
                        
                    </div>
                    </div>
                
                    <!-- Password input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piNewPassRepeat">Confirm password</label>
                    <div class="col-md-4">
                        <input id="piNewPassRepeat" name="piNewPassRepeat" type="password" placeholder="" class="form-control input-md" required="">
                        
                    </div>
                    </div>
                    <!-- Change Name -->
                    <legend>Change Name</legend>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piName">Full Name</label>
                    <div class="col-md-4">
                        <input id="piCurrPass" name="name" type="text" placeholder="" class="form-control input-md" required="" value ="">
                    </div>
                    </div>
                
                    <!-- Change Email -->
                    <legend>Change Email</legend>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="piEmail">Email</label>
                    <div class="col-md-4">
                        <input id="piCurrPass" name="email" type="text" placeholder="" class="form-control input-md" required="" value = "bilgates@gmail.com">
                    </div>
                    </div>

                    <legend></legend>
                    <!-- Button (Double) -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bCancel"></label>
                    <div class="col-md-8">
                        <a href="{{route('profile')}}" id="bCancel" name="bCancel" class="btn btn-danger">Cancel</a>
                        <button id="bChange" name="bChange" class="btn btn-success" type = "submit">Change</button>
                    </div>
                    </div>
                        </form>
                    </fieldset>
                </div>

            <script>
                document.querySelector("#goSettings").onclick = function (){
                    if(document.querySelector(".form-horizontal").classList.contains("notactive")){
                        document.querySelector(".form-horizontal").classList.remove("notactive");
                        document.querySelector(".form-horizontal").classList.add("active");
                    }
                    else{
                        document.querySelector(".form-horizontal").classList.remove("active");
                        document.querySelector(".form-horizontal").classList.add("notactive");
                    }
                }   
            </script>
    </body>
</html>
