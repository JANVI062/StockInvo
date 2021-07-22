<?php 
include('db_connect.php');
if(isset($_GET['id'])){
	$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
	foreach($user->fetch_array() as $k =>$v){
		$meta[$k] = $v;
	}
	$store = $conn->query("SELECT * FROM store where store_id =".$meta['store_id']);
	foreach($store->fetch_array() as $k =>$v){
		$meta[$k] = $v;
	}
	$phone = $conn->query("SELECT phone_number FROM user_phone where user_phone.user_id =".$_GET['id']);
	$datas=array();
	while($row=$phone->fetch_assoc()){
		$datas[]= $row;
	}
}
?>
<div class="container-fluid">
	
	<form action="" id="edit_profile">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<input type="hidden" name="type" value=<?php echo isset($meta['type']) ? $meta['type']: 2 ?>>
		<div class="form-group">
			<label for="name">First Name</label>
			<input type="text" name="first_name" id="name" class="form-control" value="<?php echo isset($meta['first_name']) ? $meta['first_name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Last Name</label>
			<input type="text" name="last_name" id="username" class="form-control" value="<?php echo isset($meta['last_name']) ? $meta['last_name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<input type="email" name="email" id="username" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required>
		</div>
		
		<div class="form-group">
			<label for="password">Pincode</label>
			<input type="number" name="pincode" id="password" class="form-control" value="<?php echo isset($meta['pincode']) ? $meta['pincode']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="password">City</label>
			<input type="text" name="city" id="password" class="form-control" value="<?php echo isset($meta['city']) ? $meta['city']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="password">State</label>
			<input type="text" name="state" id="password" class="form-control" value="<?php echo isset($meta['state']) ? $meta['state']: '' ?>" required>
		</div>
		<?php if($meta['type'] == 1): ?>
		<input type="hidden" name="store_id" value="<?php echo isset($meta['store_id']) ? $meta['store_id']: '' ?>">
		<div class="form-group">
			<label for="password">Store Name</label>
			<input type="text" name="store_name" id="password" class="form-control" value="<?php echo isset($meta['store_name']) ? $meta['store_name']: '' ?>">
		</div>
		<div class="form-group">
			<label for="password">Store Location</label>
			<input type="text" name="store_loc" id="password" class="form-control" value="<?php echo isset($meta['store_loc']) ? $meta['store_loc']: '' ?>">
		</div>
		<?php endif;?>
	</form>
</div>
<script>
	$('#edit_profile').submit(function(e){
		e.preventDefault();
		start_load()
		console.log($(this).serialize())
		$.ajax({
			url:'ajax.php?action=edit_profile',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				console.log(resp)
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>