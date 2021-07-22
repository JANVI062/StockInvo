<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Stockinvo</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

// $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
// 		foreach ($query as $key => $value) {
// 			if(!is_numeric($key))
// 				$_SESSION['setting_'.$key] = $value;
// 	}
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	
    body,
    html {
        height: 100%;
        line-height: 1.8;
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
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#00000061;
		background-image: url(https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1002&q=80);
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
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

<!-- Navbar (sit on top) -->
<div class="w3-top">
	<div class="w3-bar w3-white w3-card" id="myNavbar">
		<a href="home_page.php" class="w3-bar-item w3-button logo"><img src="assets\img\stockinvo2.jpeg"></a>
		<!-- Right-sided navbar links -->

		
		<div class="w3-right w3-hide-small">
			<a href="login.php" class="w3-bar-item w3-button"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
			<a href="registration.php" class="w3-bar-item w3-button"><i class="fas fa-user-plus"></i> REGISTER</a>
		</div>

		<!-- Hide right-floated links on small screens and replace them with a menu icon -->

		
	</div>
</div>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Email</label>
  							<input type="email" id="username" name="email" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-p1ry">Login</button></center>
						  <p class="signup">
							Don't have an account? 
							<a href="./registration.php">
								<i>Sign Up</i>
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
	$('#login-form').submit(function(e){
		e.preventDefault()
	
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();

		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>

</html>