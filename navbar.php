

<nav id="sidebar" class="mx-lt-5 bg" style="background-color: #0a0a0a;">
		
		<div class="sidebar-list" >

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span> Inventory</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Category</a>
				<a href="index.php?page=product" class="nav-item nav-product"><span class='icon-field'><i class="fa fa-boxes"></i></span> Products</a>
				<a href="index.php?page=supplier" class="nav-item nav-supplier"><span class='icon-field'><i class="fa fa-truck-loading"></i></span> Suppliers</a>
				<a href="index.php?page=customer" class="nav-item nav-customer"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Retailers</a>
				
				<button  class=" dropdown-btn">
				<span class='icon-field'><i class="fa fa-file-alt"></i></span> &nbsp;Reports &nbsp; <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="index.php?page=sales" class="nav-item nav-sales"><span class='icon-field'><i class="fa fa-coins"></i></span> Sales</a>
					<a href="index.php?page=receiving" class="nav-item nav-receiving nav-manage_receiving"><span class='icon-field'><i class="fa fa-file-alt"></i></span> Purchase</a>
				</div>

				
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
			
				<a href="index.php?page=profile" class="nav-item nav-customer"><span class='icon-field'><i class="fa fa-user"></i></span>  My Profile</a>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')

	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
	dropdown[i].addEventListener("click", function() {
	this.classList.toggle("active");
	var dropdownContent = this.nextElementSibling;
	if (dropdownContent.style.display === "block") {
	dropdownContent.style.display = "none";
	} else {
	dropdownContent.style.display = "block";
	}
	});
	}

</script>
<!-- <?php if($_SESSION['login_type'] != 1): ?>
	<style>
		.nav-item{
			display: none!important;
		}
		.nav-sales ,.nav-home ,.nav-inventory{
			display: block!important;
		}
	</style>
<?php endif ?> -->