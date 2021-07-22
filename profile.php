<?php include('db_connect.php');
if(isset($_SESSION['login_id'])){
	$qry = $conn->query("SELECT * FROM users where id=".$_SESSION['login_id']);
    foreach($qry->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
    $store = $conn->query("SELECT * FROM store where store_id =".$_SESSION['login_store_id']);
    foreach($store->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
    $phone = $conn->query("SELECT phone_number FROM user_phone where user_phone.user_id =".$_SESSION['login_id']);
    $datas=array();
    while($row=$phone->fetch_assoc()){
        $datas[]= $row;
    }
}  

?>
<div class="container-fluid">
    <div class="col-lg-12">
    <div class="row">
			<button class="col-md-2 float-right btn btn-primary btn-sm edit_profile" id="manage_profile"><i class="fa fa-user-edit"></i>  Edit Profile</button>
		</div>
		<div class="row">
       
			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card profile">
					<div class="card-body profile">
                        <div class="card-header heading">Profile</div>
                        <table class="table table-bordered table-hover " >
                            <tr>
                            <th>Name:</th>
                            <td><?php echo $meta['first_name'] . " ".  $meta['last_name'] ?></td>
                            </tr>
                            <tr>
                            <th>Email:</th>
                            <td><?php echo $meta["email"] ?></td>
                            </tr>
                            <tr>
                            <th>Contact No:</th>
                            <td><?php 
                            foreach ($datas[0] as $data){
						        echo $data;
                                echo "<br>";
					        } 
                            ?> 
                            <?php
                                foreach ($datas[1] as $data){
                                    echo  $data;
                                }
                            ?></td>
                            </tr>
                            <tr>
                            <th>Address:</th>
                            <td><?php echo $meta["city"] ." (" .$meta["pincode"] ."), ". $meta["state"] ?></td>
                            </tr>
                            <tr>
                            <th>Store id:</th>
                            <td><?php echo $meta["store_id"] ?></td>
                            </tr>
                            <tr>
                            <th>Store Name:</th>
                            <td><?php echo $meta["store_name"] ?></td>
                            </tr>
                            <tr>
                            <th>Store Location:</th>
                            <td><?php echo $meta["store_loc"] ?></td>
                            </tr>
                        </table>
					</div>
				</div>
                    
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
    .profile
    {
        width:950px;
    }
	.heading
    {
        font-size:20px;
        font-weight:600;
    }
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
	$('#manage_profile').click(function(){
        uni_modal('Edit Profile','edit_profile.php?id=<?php echo $_SESSION["login_id"]?>')
	})
</script>