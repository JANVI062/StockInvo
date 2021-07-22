<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register | Stockinvo</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <?php include('./header.php'); ?>
  <?php include('./db_connect.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
  header("location:index.php?page=home");
  
//   $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
//           foreach ($query as $key => $value) {
//               if(!is_numeric($key))
//                   $_SESSION['setting_'.$key] = $value;
//           }
  ?>
  
</head>
<style>

	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position:fixed;
		left:0;
		width:60%;
		height: 740px;
		background:#00000061;
		background-image: url(https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1002&q=80);
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto;
		
	}
	.w3-bar .w3-button {
        padding: 10px;
    }
    
    .logo {
        margin-top: 2px;
        height: 20%;
        width: auto;
    }
    
    .logo img {
        height: 38px;
        width: 10rem;
    }
	.signup {
	margin-top:20px;
	text-align:center;
	}
	.signup >a
	{
	float:center;
	}
	
</style>
<body>
<div class="w3-top">
	<div class="w3-bar w3-white w3-card" id="myNavbar">
		<a href="home_page.php" class="w3-bar-item w3-button logo"><img src="assets\img\stockinvo2.jpeg"></a>
		<!-- Right-sided navbar links -->
		<div class="w3-right w3-hide-small">
			<a href="login.php" class="w3-bar-item w3-button"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
			<a href="registration.php" class="w3-bar-item w3-button"><i class="fas fa-user-plus"></i> REGISTER</a>
		</div>
	</div>
</div>
    <main id="main" class=" bg-dark mt-3 pt-5">
        <div id="login-left">
        </div>
        <div id="login-right">
            <div class="card col-md-8">
                <div class="card-body">
                    <form id="signup-form" >
                        <div class="form-group">
                            <input type="text" id="fname" name="first_name" class="form-control"  placeholder="First Name*" required>
                        </div>
  						<div class="form-group">
  							<input type="text" id="lname" name="last_name" class="form-control" placeholder="Last Name">
  						</div>
						<div class="form-group">
							<input type="text" id="mobile" name="phone_number" class="form-control" placeholder="Mobile No.*" pattern="[6-9]{1}[0-9]{9}" required>
							&nbsp;<small>(10 digits allowed)</small>
						</div>
						<div class="form-group">
							<input type="text" id="mobile" name="mobile_number" class="form-control" placeholder="Phone No." pattern="[6-9]{1}[0-9]{9}">
							&nbsp;<small>(10 digits allowed)</small>
						</div>
						<div class="form-group">
                            <input type="email" id="fname" name="email" class="form-control"  placeholder="Email*" required>
						</div>
						<div class="form-group">
                            <input type="password" id="password" name="password" class="form-control"  placeholder="Password*" required>
                        </div>
						<div class="form-group">
                            <input type="password" id="cpassword" name="cpassword" class="form-control"  placeholder="Confirm Password*" required>
                        </div>
						<div class="form-group">
							<input type="number" id="pincode" name="pincode" class="form-control" placeholder="Pincode*" required>
						</div>
						<div class="form-group">
							<input type="text" id="city" name="city" class="form-control" placeholder="City/Town*" required>
						</div>
						<div class="form-group">
                          <select name="state" id="state" class="form-control" required>
                            <option value="" disabled selected>State*</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                          </select>
                        </div>
						<div class="form-group">
							<select name="type" id="type" class="form-control"   required>
							<option value="" disabled selected>User Type*</option>
								<option value="Owner">Owner</option>
								<option value="Permissible">Permissible</option>
							</select>
						</div>
							<div class="form-group">
							<input type="text" id="Store_id" name="store_id" class="form-control" placeholder="Store id*" required>
						   </div>
						   <div class="form-group" id="ifYes" style="display: block;">
						   		<div class="form-group">
								<input type="text" id="Store_name" name="store_name" class="form-control" placeholder="Store name*" required>
								</div>
							
								<input type="text" id="Store_loc" name="store_loc" class="form-control" placeholder="Store location*" required>
							</div>	

  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-p1ry">Sign Up</button></center>
						  <p class="signup">
							Already have an account? 
							<a href="./login.php">
								<i>Login</i>
							</a>
						  </p>
					</form>
  				</div>
  			</div>
  		</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>

		function yesnoCheck(that) {
			if (that.value == "Owner") {
				
				document.getElementById("ifYes").style.display = "block";
			
			} 
			
			else {
				document.getElementById("ifYes").style.display = "none";
			}
		}
		
	$('#signup-form').submit(function(e){
		e.preventDefault()
		$('#signup-form button[type="button"]').attr('disabled',true).html('Signing up...');
		
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();

		$.ajax({
			url:'ajax.php?action=signup',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#signup-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				console.log(resp)
				if(resp == 1){
					location.href ='index.php?page=home';
				}
				else if(resp==3){
					$('#signup-form').prepend('<div class="alert alert-danger">You are not given permissions to register with this store.</div>')}
				
				else{
					console.log(resp)
					$('#signup-form').prepend('<div class="alert alert-danger">Email id already exists.</div>')
					$('#signup-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("cpassword");

function validatePassword(){
  if(password.value != cpassword.value) {
    cpassword.setCustomValidity("Passwords Don't Match");
  } else {
    cpassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
cpassword.onkeyup = validatePassword;
</script>	

</html>