<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-customer">
				<div class="card">
					<div class="card-header">
						   Retailer Form
				  	</div>
					<div class="card-body">
					<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Retailer</label>
								<input type="text" class="form-control" name="customer_name">
							</div>
					
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Email id</label>
								<input type="email" class="form-control" name="email_id">
							</div>
							
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact" pattern="[6-9]{1}[0-9]{9}">
							</div>
				
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Firm Name</label>
								<textarea class="form-control" cols="30" rows="3" name="firm_name"></textarea>
							</div>
					
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Firm Location</label>
								<textarea class="form-control" cols="30" rows="3" name="firm_location"></textarea>
							</div>
					
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Pincode</label>
								<input type="text" class="form-control" name="pincode">
							</div>
						
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">City</label>
								<input type="text" class="form-control" name="city">
							</div>
					
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">State</label>
								<input type="text" class="form-control" name="state">
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-customer').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Retailer</th>
									<th class="action text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$customer = $conn->query("SELECT * FROM customer_list order by id asc");
								while($row=$customer->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
									<p>Name : <b><?php echo $row['customer_name'] ?></b></p>
										<p><small>Contact No. : <b><?php echo $row['contact'] ?></b></small></p>
										<p><small>Firm Name : <b><?php echo $row['firm_name'] ?></b></small></p>
										<p><small>Firm Address : <b><?php echo $row['firm_location'] .', '. $row['city'] .' ('. $row['pincode'] .'), '. $row['state'] ?></b></small></p>
									</td>
									<td class="action text-center">
										<button class="btn btn-sm btn-primary edit_customer" type="button" data-id="<?php echo $row['id'] ?>" data-customer_name="<?php echo $row['customer_name'] ?>"  data-email_id="<?php echo $row['email_id'] ?>" data-contact="<?php echo $row['contact'] ?>" data-firm_name="<?php echo $row['firm_name'] ?>" data-firm_location="<?php echo $row['firm_location'] ?>" data-pincode="<?php echo $row['pincode'] ?>" data-city="<?php echo $row['city'] ?>" data-state="<?php echo $row['state'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_customer" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
	$('table').dataTable()
	$('#manage-customer').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_customer',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_customer').click(function(){
		start_load()
		var cat = $('#manage-customer')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='customer_name']").val($(this).attr('data-customer_name'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='email_id']").val($(this).attr('data-email_id'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='firm_name']").val($(this).attr('data-firm_name'))
		cat.find("[name='firm_location']").val($(this).attr('data-firm_location'))
		cat.find("[name='pincode']").val($(this).attr('data-pincode'))
		cat.find("[name='city']").val($(this).attr('data-city'))
		cat.find("[name='state']").val($(this).attr('data-state'))
		end_load()
	})
	$('.delete_customer').click(function(){
		_conf("Are you sure to delete this customer?","delete_customer",[$(this).attr('data-id')])
	})
	function delete_customer($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_customer',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

<?php if($_SESSION['login_type'] != 1): ?>
	<style>
		#manage-customer{
			display: none!important;
		}
		.action{
			display: none!important;
		}
	</style>
<?php endif ?>