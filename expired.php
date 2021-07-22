<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4><b>Expired Products</b></h4>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Product Name | Batch No.</th>
								<th class="text-center">Total Quantity Loss</th>
								<th class="text-center">Expiry Date</th>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$product = $conn->query("SELECT * FROM product_list");
								while($row=$product->fetch_assoc()):
								$inn = $conn->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = ".$row['id']);
								$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
								$out = $conn->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = ".$row['id']);
								$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;
								$available = $inn - $out;
                                $expired = $conn->query("SELECT date(expiry_date) as expired FROM product_list where id = ".$row['id']);
								$expired = $expired && $expired->num_rows > 0 ? $expired->fetch_array()['expired'] : 0;
                                $product_desc = $conn->query("SELECT description as product_desc FROM product_list where id = ".$row['id']);
								$product_desc = $product_desc && $product_desc->num_rows > 0 ? $product_desc->fetch_array()['product_desc'] : 0;
                            ?>
                            <?php if($expired == date('Y-m-d')){ ?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['name'] ." | ". $row['batch'] ?>
										<p class="pdesc"><small><i>Description: <b><?php echo $product_desc ?></b></i></small></p>
									</td>
									<td class="text-right"><?php echo $available ?></td>
									<td class="text-right"><?php echo $expired ?></td>
								</tr>
                            <?php } ?>
							<?php endwhile; ?>
							</tbody>
						</table>
                        <a class="btn btn-sm btn-danger delete_expired" style="color:white;">Remove From Inventory</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable()
	$('.delete_expired').click(function(){
		delete_expired()
	})
	function delete_expired(){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_expired',
			method:'POST',
			data:{},
			success:function(resp){
				console.log(resp)
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