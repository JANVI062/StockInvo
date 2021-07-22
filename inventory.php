<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4><b>Inventory</b></h4>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Product Name | Batch No.</th>
								<th class="text-center">Stock In</th>
								<th class="text-center">Stock Out</th>
								<th class="text-center">Stock Available</th>
								<th class="text-center">Supplier</th>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$product = $conn->query("SELECT * FROM product_list order by name asc");
								while($row=$product->fetch_assoc()):
								$inn = $conn->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = ".$row['id']);
								$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
								$out = $conn->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = ".$row['id']);
								$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;
								$available = $inn - $out;
								$supplier_id = $conn->query("SELECT supplier_id as supplier_id FROM product_list where id = ".$row['id']);
								$supplier_id = $supplier_id && $supplier_id->num_rows > 0 ? $supplier_id->fetch_array()['supplier_id'] : 0;
								$supplier_name = $conn->query("SELECT supplier_name as supplier_name FROM supplier_list where id = ".$supplier_id);
								$supplier_name = $supplier_name && $supplier_name->num_rows > 0 ? $supplier_name->fetch_array()['supplier_name'] : 0;
								$product_desc = $conn->query("SELECT description as product_desc FROM product_list where id = ".$row['id']);
								$product_desc = $product_desc && $product_desc->num_rows > 0 ? $product_desc->fetch_array()['product_desc'] : 0;
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['name'] ." | ". $row['batch'] ?>
										<p class="pdesc"><small><i>Description: <b><?php echo $product_desc ?></b></i></small></p>
									</td>
									<td class="text-right"><?php echo $inn ?></td>
									<td class="text-right"><?php echo $out ?></td>
									<td class="text-right"><?php echo $available ?></td>
									<td class="text-right"><?php echo $supplier_name ?></td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable()
	$('#new_receiving').click(function(){
		location.href = "index.php?page=manage_receiving"
	})
	$('.delete_receiving').click(function(){
		_conf("Are you sure to delete this data?","delete_receiving",[$(this).attr('data-id')])
	})
	function delete_receiving($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_receiving',
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