<style>
   
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<?php echo "Welcome back ".$_SESSION['login_first_name']."!"  ?>
									
				</div>
				<hr>
				<a href="index.php?page=today_sales">
					<div class="alert alert-success col-md-4 ml-4">
						<p><b><large>Total Sales Today</large></b></p>
					<hr>
						<p class="text-right"><b><large><?php 
						include 'db_connect.php';
						$sales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
						echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";
						
						?></large></b></p>
					</div> 
				</a>

				<a href="index.php?page=reorder">
					<div class="alert alert-success col-md-4 ml-4"> 
						<p><b><large>Reorder Point</large></b></p>
					<hr>
						<p class="text-right"><b><large>
						<?php 
						include 'db_connect.php';
						$total=0;
						$product = $conn->query("SELECT * FROM product_list r order by name asc");
						while($row=$product->fetch_assoc()):
							$inn = $conn->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = ".$row['id']);
							$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
							$out = $conn->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = ".$row['id']);
							$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;
							$available = $inn - $out;
							if($available <= 10) $total++;
						endwhile; 
						echo $total;
						?>


					</large></b></p>
					</div>
				</a>

				<a href="index.php?page=expired">
					<div class="alert alert-success col-md-4 ml-4">
						<p><b><large>Expired Products</large></b></p>
					<hr>
						<p class="text-right"><b><large><?php 
						include 'db_connect.php';
						$i=0;
						$expired = $conn->query("SELECT * FROM product_list where date(expiry_date)= '".date('Y-m-d')."'");
						while($expired->fetch_assoc()){
							$i++;
						}
						echo $i;

						?></large></b></p>
					</div>
				</a>
			</div>
			
		</div>
		</div>
	</div>

</div>
<script>
	
</script>