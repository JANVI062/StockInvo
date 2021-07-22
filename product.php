<?php include('db_connect.php');
	$batch = mt_rand(1,99999999);
	$batch = sprintf("%'.08d\n", $batch);
	$i = 1;
	while($i == 1){
		$chk = $conn->query("SELECT * FROM product_list where batch ='$batch'")->num_rows;
		if($chk > 0){
			$batch = mt_rand(1,99999999);
			$batch = sprintf("%'.08d\n", $batch);
		}else{
			$i=0;
		}
	}
?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-product">
				<div class="card">
					<div class="card-header">
						    Product Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Batch</label>
								<input type="text" class="form-control" name="batch" value="<?php echo $batch ?>">
							</div>
							
					
							<div class="form-group">
								<label class="control-label">Category</label>
								<select name="category_id" id="" class="custom-select browser-default">
								<?php 

								$cat = $conn->query("SELECT * FROM category_list order by name asc");
								while($row=$cat->fetch_assoc()):
									$cat_arr[$row['id']] = $row['name'];
								?>
								
								<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
						<div class="form-group">
							<label class="control-label">Product Name</label>
							<input type="text" class="form-control" name="name" >
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea class="form-control" cols="30" rows="3" name="description"></textarea>
						</div>
						<div class="form-group">
								<label class="control-label">Supplier Name</label>
								<select name="supplier_id" id="" class="custom-select browser-default">
								<?php 

								$sup = $conn->query("SELECT * FROM supplier_list order by supplier_name asc");
								while($row=$sup->fetch_assoc()):
									$sup_arr[$row['id']] = $row['supplier_name'];
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['supplier_name'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
						
						<div class="form-group">
							<label class="control-label">Selling Price</label>
							<input type="number" step="any" class="form-control text-right" name="selling_price" >
						</div>
						<div class="form-group">
							<label class="control-label">Expiry Date</label>
							<input type="date" class="form-control" name="expiry_date" >
						</div>

					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-product').get(0).reset()"> Cancel</button>
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
									<th class="text-center">Product Info</th>
									<th class="action text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$prod = $conn->query("SELECT * FROM product_list");
								while($row=$prod->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Batch No. : <b><?php echo $row['batch'] ?></b></p>
										<p><small>Category : <b><?php echo $cat_arr[$row['category_id']] ?></b></small></p>
										<p><small>Name : <b><?php echo $row['name'] ?></b></small></p>
										<p><small>Description : <b><?php echo $row['description'] ?></b></small></p>
							
										<p><small> Selling Price : <b><?php echo number_format($row['selling_price'],2) ?></b></small></p>
										<p><small> Expiry Date : <b><?php echo $row['expiry_date'] ?></b></small></p>
										<p><small> Supplier Name : <b><?php echo $sup_arr[$row['supplier_id']] ?></b></small></p>
									</td>
									<td class="action text-center">
										<button class="btn btn-sm btn-primary edit_product" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-batch="<?php echo $row['batch'] ?>" data-category_id="<?php echo $row['category_id'] ?>" data-description="<?php echo $row['description'] ?>" data-selling_price="<?php echo $row['selling_price'] ?>"  data-expiry_date="<?php echo $row['expiry_date'] ?>"  data-supplier_id="<?php echo $row['supplier_id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_product" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	$('#manage-product').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_product',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				console.log(resp)
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
	$('.edit_product').click(function(){
		start_load()
		var cat = $('#manage-product')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='batch']").val($(this).attr('data-batch'))
		cat.find("[name='category_id']").val($(this).attr('data-category_id'))
		cat.find("[name='supplier_id']").val($(this).attr('data-supplier_id'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='selling_price']").val($(this).attr('data-selling_price'))
		cat.find("[name='supplier_id']").val($(this).attr('data-supplier_id'))
		cat.find("[name='expiry_date']").val($(this).attr('data-expiry_date'))
		
		end_load()
	})
	$('.delete_product').click(function(){
		_conf("Are you sure to delete this product?","delete_product",[$(this).attr('data-id')])
	})
	function delete_product($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_product',
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
		#manage-product{
			display: none!important;
		}
		.action{
			display: none!important;
		}
	</style>
<?php endif ?>