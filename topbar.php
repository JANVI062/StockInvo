<style>
	.logo {
    margin-top: 2px;
    height: 38px;
    width: auto;
}
  .logo img{
    height: 38px;
    width: 10rem;
    margin-left: -15px;
  }
</style>

<nav class="navbar navbar-white bg-white fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
        <a href="index.php?page=home" ><img src="assets\img\stockinvo2.jpeg"></a>
  			
  			</div>
  		</div>
      
	  	<div class="col-md-2 float-right text-dark" style="margin-right:-7rem;margin-top:5px;">
	  		<a href="ajax.php?action=logout" class="text-dark"><?php echo $_SESSION['login_first_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>