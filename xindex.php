<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/icon.png">
    <title>Pinas | Login Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/map.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<script type="text/javascript">
    function show(shown, hidden) {
                document.getElementById(shown).style.display='block';
                document.getElementById(hidden).style.display='none';
                return false;
            }
	</script>
<body style="background-color: #21346e; font-size: 13px; margin-top: 100px;">
<!-- Start Page -->	
<div data-role="page" id="Login">
	<div data-role="main" class="ui-content">
		<div class="index-style">
		<center><img src="images/icon.png" width="200"><br><br>
		<div style="max-width: 400px;"><br>
  			<div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
        		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        		<input type="text" class="form-control" style="font-size: 12px" id="user-login" placeholder="Email">
  			</div>
  			<div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
        		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        		<input class="form-control" type="password" style="font-size: 12px" id="pass-login" placeholder="Password">
 			</div>
 			<input type="submit" class="btn btn-info" value="Login" id="login-button" style="width: 40%; background-color:#105285;"><br><br>
 			<span style="color: #fff;">Create an account here! <a onclick="return show('Register','Login');" style="cursor: pointer; color:#ffb618;"> Sign Up Now </a></span>
		</center>
		</div> 
	</div>

	<div data-role="footer" data-position="fixed" data-fullscreen="true">	
	</div>
</div>
<div data-role="page" id="Register" style="display: none;">
    <div data-role="header" data-position="formixed" data-fullscreen="true">
    </div>
    <div data-role="main" class="ui-content">
        <div class="index-style-reg">
        <center>
        <div style="max-width: 400px;"><br>
           
            <h1 style="color: #fff;">Create Account</h1><p style="color: #fff;">Please complete your details</p><br>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" style="font-size: 12px" id="user-fname" placeholder="First Name">
            </div>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" style="font-size: 12px" id="user-lname" placeholder="Last Name">
            </div>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input class="form-control" type="text" style="font-size: 12px" id="email" placeholder="Email">
            </div>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <select class="form-control" name="gender" placeholder="Gender" style="font-size: 12px" >
                    <option selected hidden="">Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" style="font-size: 12px" id="user-lname" placeholder="Age">
            </div>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="form-control" type="password" style="font-size: 12px" id="pass-reg" placeholder="Password">
            </div>
            <div class="input-group has-color" style="padding-bottom: 2%; width: 300px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="form-control" type="password" style="font-size: 12px" id="cpass-reg" placeholder="Confirm Password">
            </div>
            <span style="color: #fff;" id='error-message'>   
            </span><br>
            <span style="color: #fff;">By clicking Register, you agree to our <br><a data-toggle="modal" data-target="#myModal" style="cursor: pointer; color:#ffb618;"> Terms of Use and Data Policy</a></span><br><br>
            <input type="submit" class="btn btn-info" value="Register" style="width: 40%; background-color:#105285;" id="register-button"><br><br>
            
            <span style="color: #fff;">Already have an account? <a onclick="return show('Login','Register');" style="cursor: pointer; color: #ffb618;">Sign in </a></span>
        </center>
        </div> 
    </div>

    <div data-role="footer" data-position="fixed" data-fullscreen="true">   
    </div>
</div>


<div class="modal" id="myModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h6 class="modal-title">Terms of Use and Data Policy</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: justify;">
        <center><img src="images/icon.png" width="50"></center><br>
        <p style="font-size: 13px !important;"> Please read these Terms of Use and Data Policy carefully. By using the Agila Service, you agree that you have read and understood the Terms of Use and Data Policy of this service. The Agreement applies to your use of the Service provided by Agila.</p>
        <p style="font-size: 13px !important;"> By using this application you are about to share your personal data. "Personal Data" means the information about you, from which you can be personally identifiable, including but not limited to your name and email which will collect, stored, and processed by the application. Using this application includes obtaining more information such as getting your location and your current location, reporting incident, reporting missing person which may requires other person’s information. The data collected will be use such as location may be used for future processing and communication.</p>
        <p style="font-size: 13px !important;">If you do not agree to these Terms of Use and Data Policy, please do not use or continue using the Application or the Service.</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>