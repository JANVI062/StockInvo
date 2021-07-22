<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		
		$qry = $this->db->query("SELECT * FROM users where email = '".$email."' and password = '".md5($password)."' ");
		
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if(!is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			$store_id = $_SESSION['login_store_id'];
			$qry = $this->db->query("SELECT * FROM store where store_id = '$store_id' ");

			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if(!is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				return 1;
			}
		}
		return 3;
	}
	
	// function login2(){
	// 	extract($_POST);
	// 	$qry = $this->db->query("SELECT * FROM users where email = '".$email."' and password = '".md5($password)."' ");
		
	// 	if($qry->num_rows > 0){
	// 		foreach ($qry->fetch_array() as $key => $value) {
	// 			if($key != 'passwors' && !is_numeric($key))
	// 				$_SESSION['login_'.$key] = $value;
	// 		}
	// 		$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
	// 		$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_user_id']."' where client_ip ='$ip' ");
	// 			return 1;
	// 	}else{
	// 		return 3;
	// 	}
	// }
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:home_page.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", store_id = $_SESSION[login_store_id] ";
		
		$save = $this->db->query("INSERT into permissible_users_list set ".$data);

		if($save){
			return 1;
		}
	}

	function edit_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		
		$save = $this->db->query("UPDATE permissible_users_list set ".$data." where id = " .$id);

		if($save){
			return 1;
		}
		return $save;
	}
    
	function signup(){
		extract($_POST);
		$chk1 = 1;
		
		if($type == 'Permissible')
		{
			$chk1 = $this->db->query("SELECT * FROM permissible_users_list where email = '$email' and store_id = '$store_id' ")->num_rows;
		}
		
		if($chk1 > 0){

			$data = " first_name = '$first_name' ";
			$data .= ", last_name = '$last_name' ";
			$data .= ", email = '$email' ";
			$data .= ", pincode = '$pincode' ";
			$data .= ", city = '$city' ";
			$data .= ", state = '$state' ";
			$data .= ", password = '".md5($password)."' ";
			$data .= ", store_id = '$store_id' ";
			$chk = $this->db->query("SELECT * FROM users where email = '$email' ")->num_rows;
			
			if($chk > 0){
				return 2;
				exit;
			}

			if($type == 'Owner'){
				$type = 1;
				$store_data = " store_id = '$store_id' ";
				$store_data .= ", store_name = '$store_name' ";
				$store_data .= ", store_loc = '$store_loc' ";
				$save_store = $this->db->query("INSERT INTO store set ".$store_data);		
			}else{
				$type = 2;
			}

			$data .= ", type = '$type' ";
			$save = $this->db->query("INSERT INTO users set ".$data);
			$id =$this->db->insert_id;
			
				$data2 = " user_id = '$id' ";
				$data2 .= ", phone_number = '$phone_number' ";
				$save2 = $this->db->query("INSERT INTO user_phone set ".$data2);
				if(!empty($mobile_number))
				{	
					$data3 = " user_id = '$id' ";
					$data3.= ", phone_number = '$mobile_number' ";
					$save3= $this->db->query("INSERT INTO user_phone set ".$data3);
				}
			if($save){
				$login = $this->login();
				return 1;
			}
		}
			// $count = 0;
			// $id =$this->db->insert_id;
			// foreach($phone_number as $k => $v){
			// 	" user_id = '$id' ";
			// 	" phone_number = '$phone_number[$k]' ";
			// 	$count++;
			// }

			// for ($i = 1; $i <= $count; $i++) {
			// 	$save2= $this->db->query("INSERT INTO `user_phone` (`user_id`, `phone_number`)
			// 	VALUES ('$user_id', '$phone_number[$i]')"),
			// }

			
		
		else{
			return 3;
		}
	}
	
	function edit_profile(){
		extract($_POST);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", email = '$email' ";
		$data .= ", pincode = $pincode ";
		$data .= ", city = '$city' ";
		$data .= ", state = '$state' ";
		$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);

		if($type == 1){
			$data2 = "store_name = '$store_name' ";
			$data2 .= ", store_loc = '$store_loc' ";
			$save2 = $this->db->query("UPDATE store set ".$data2." where store_id = ".$store_id);
			if($save2) return 1;
			else return $save;
		}
			// $id1 =$this->db->insert_id;
			// $data2 = " user_id = '$id' ";
			// $data3 = " phone_number = '$phone_number' ";
			// $save3 = $this->db->query("UPDATE user_phone set ".$data3." where user_id = ".$id1);
			
			// if(!empty($mobile_number))
			// {	
			// 	$data4 = " phone_number = '$mobile_number' ";
			// 	$save4 = $this->db->query("UPDATE user_phone set ".$data4." where user_id = ".$id1);
			// 	if($save4) return 1;
			// 	else return $save;
			// }
			// if($save3) return 1;
			// else return $save;
		// $id =$this->db->insert_id;
		// foreach($phone_number as $k => $v){
		// 	$data3 = "phone_number = '$phone_number[$k]' ";
		// 	$save3[] = $this->db->query("UPDATE user_phone set ".$data3." where user_id = ".$id);
		// }
		

		if($save){
			return 1;
		}
		return 0;
	}


	// function save_settings(){
	// 	extract($_POST);
	// 	$data = " name = '$name' ";
	// 	$data .= ", email = '$email' ";
	// 	$data .= ", contact = '$contact' ";
	// 	$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
	// 	if($_FILES['img']['tmp_name'] != ''){
	// 					$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
	// 					$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
	// 				$data .= ", cover_img = '$fname' ";

	// 	}
		
	// 	// echo "INSERT INTO system_settings set ".$data;
	// 	$chk = $this->db->query("SELECT * FROM system_settings");
	// 	if($chk->num_rows > 0){
	// 		$save = $this->db->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
	// 	}else{
	// 		$save = $this->db->query("INSERT INTO system_settings set ".$data);
	// 	}
	// 	if($save){
	// 	$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
	// 	foreach ($query as $key => $value) {
	// 		if(!is_numeric($key))
	// 			$_SESSION['setting_'.$key] = $value;
	// 	}

	// 		return 1;
	// 			}
	// }

	function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_supplier(){
		extract($_POST);
		$data = " supplier_name = '$supplier_name' ";
		$data .= ", email_id = '$email_id' ";
		$data .= ", contact = '$contact' ";
		$data .= ", firm_name = '$firm_name' ";
		$data .= ", firm_location = '$firm_location' ";
		$data .= ", pincode = '$pincode' ";
		$data .= ", city = '$city' ";
		$data .= ", state = '$state' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO supplier_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE supplier_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_supplier(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM supplier_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_product(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", batch = $batch ";
		$data .= ", category_id = $category_id ";
		$data .= ", supplier_id = $supplier_id ";
		$data .= ", description = '$description' ";
		$data .= ", selling_price = $selling_price ";
		$data .= ", expiry_date = '$expiry_date' ";
		
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
		}
	
		if($save)
			return 1;
	}

	function delete_product(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
		if($delete)
			return 1;
	}
	function delete_user(){
		extract($_POST);
		
		$delete = $this->db->query("DELETE FROM users where email = "."'".$email."'" );
		$delete = $this->db->query("DELETE FROM permissible_users_list where email = " ."'".$email."'" );
		if($delete)
			return 1;
	}

	function delete_expired(){
		$date = date('Y-m-d');
		$expired = $this->db->query("SELECT id FROM product_list where date(expiry_date) =  " ."'".$date."'"  );
		$zero=0;
		$data = " qty = $zero ";
		while($row=$expired->fetch_assoc()):
			$this->db->query("UPDATE inventory set  ".$data." where product_id =".$row['id']);
		endwhile;
		return 1;
	}

	function save_receiving(){
		extract($_POST);
		$data = " supplier_id = '$supplier_id' ";
		$data .= ", total_amount = '$tamount' ";
		
		if(empty($id)){
			$ref_no = sprintf("%'.08d\n", $ref_no);
			$i = 1;

			while($i == 1){
				$chk = $this->db->query("SELECT * FROM receiving_list where ref_no ='$ref_no'")->num_rows;
				if($chk > 0){
					$ref_no = mt_rand(1,99999999);
					$ref_no = sprintf("%'.08d\n", $ref_no);
				}else{
					$i=0;
				}
			}
			$data .= ", ref_no = '$ref_no' ";
			$save = $this->db->query("INSERT INTO receiving_list set ".$data);
			$id =$this->db->insert_id;
			foreach($product_id as $k => $v){
				$data = " form_id = '$id' ";
				$data .= ", product_id = '$product_id[$k]' ";
				$data .= ", qty = '$qty[$k]' ";
				$data .= ", price = '$price[$k]' ";
				$data .= ", type = '1' ";
				$data .= ", stock_from = 'receiving' ";
				// $details = json_encode(array('price'=>$price[$k],'qty'=>$qty[$k]));
				// $data .= ", other_details = '$details' ";
				$data .= ", remarks = 'Stock from Receiving-".$ref_no."' ";

				$save2[]= $this->db->query("INSERT INTO inventory set ".$data);
			}
			if(isset($save2)){
				return 1;
			}
		}else{
			$save = $this->db->query("UPDATE receiving_list set ".$data." where id =".$id);
			$ids = implode(",",$inv_id);
			$this->db->query("DELETE FROM inventory where type = 1 and form_id ='$id' and id NOT IN (".$ids.") ");
			foreach($product_id as $k => $v){
				$data = " form_id = '$id' ";
				$data .= ", product_id = '$product_id[$k]' ";
				$data .= ", qty = '$qty[$k]' ";
				$data .= ", price = '$price[$k]' ";
				$data .= ", type = '1' ";
				$data .= ", stock_from = 'receiving' ";
				// $details = json_encode(array('price'=>$price[$k],'qty'=>$qty[$k]));
				// $data .= ", other_details = '$details' ";
				$data .= ", remarks = 'Stock from Receiving-".$ref_no."' ";
				if(!empty($inv_id[$k])){
									$save2[]= $this->db->query("UPDATE inventory set ".$data." where id=".$inv_id[$k]);
				}else{
					$save2[]= $this->db->query("INSERT INTO inventory set ".$data);
				}
			}
			if(isset($save2)){
				
				return 1;
			}

		}
	}

	function delete_receiving(){
		extract($_POST);
		$del1 = $this->db->query("DELETE FROM receiving_list where id = $id ");
		$del2 = $this->db->query("DELETE FROM inventory where type = 1 and form_id = $id ");
		if($del1 && $del2)
			return 1;
	}
	// function save_customer(){
	// 	extract($_POST);
	// 	$data = " customer_name = '$customer_name' ";
	// 	$data .= ", email_id = '$email_id' ";
	// 	$data .= ", contact = '$contact' ";
	// 	$data .= ", firm_name = '$firm_name' ";
	// 	$data .= ", firm_location = '$firm_location' ";
	// 	$data .= ", pincode = '$pincode' ";
	// 	$data .= ", city = '$city' ";
	// 	$data .= ", state = '$state' ";

	// 	if(empty($id)){
	// 		$save = $this->db->query("INSERT INTO customer_list set ".$data);
	// 	}else{
	// 		$save = $this->db->query("UPDATE customer_list set ".$data." where id=".$id);
	// 	}
	
	// 	if($save)
	// 		return 1;
	
	// }
	function save_customer(){
			extract($_POST);
			"$customer_name = 'customer_name'";
			"$email_id = 'email_id'";
			"$contact = 'contact'";
			"$firm_name = 'firm_name'";
			"$firm_location = 'firm_location'";
			"$pincode = 'pincode'";
			"$city = 'city'";
			"$state = 'state'";
			$save =  $this->db->query("INSERT INTO `customer_list` (`customer_name`, `email_id`, `contact`, `firm_name`, `firm_location`, `pincode`, `city`, `state`) 
			VALUES ('$customer_name', '$email_id', '$contact', '$firm_name', '$firm_location', '$pincode', '$city', '$state')");
			
			// $save =  $this->db->query("INSERT INTO `customer_list` (`customer_name`, `email_id`, `contact`, `firm_name`, `firm_location`, `pincode`, `city`, `state`) 
			// VALUES ('Gauri', 'g@gmail.com', '56789872733', 'abc', 'abc', '141013', 'patiala', 'punjab')");
			
			if($save){ 
				return 1;
			}
	}
	function delete_customer(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM customer_list where id = ".$id);
		if($delete)
			return 1;
	}

	function chk_prod_availability(){
		extract($_POST);
		$selling_price = $this->db->query("SELECT * FROM product_list where id = ".$id)->fetch_assoc()['selling_price'];
		$inn = $this->db->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = ".$id);
		$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
		$out = $this->db->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = ".$id);
		$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;
		$available = $inn - $out;
		return json_encode(array('available'=>$available,'selling_price'=>$selling_price));

	}
	function save_sales(){
		extract($_POST);
		$data = " customer_id = '$customer_id' ";
		$data .= ", total_amount = '$tamount' ";
		$data .= ", amount_tendered = '$amount_tendered' ";
		$data .= ", amount_change = '$change' ";
		
		if(empty($id)){
			$ref_no = sprintf("%'.08d\n", $ref_no);
			$i = 1;

			while($i == 1){
				$chk = $this->db->query("SELECT * FROM sales_list where ref_no ='$ref_no'")->num_rows;
				if($chk > 0){
					$ref_no = mt_rand(1,99999999);
					$ref_no = sprintf("%'.08d\n", $ref_no);
				}else{
					$i=0;
				}
			}
			$data .= ", ref_no = '$ref_no' ";
			$save = $this->db->query("INSERT INTO sales_list set ".$data);
			$id =$this->db->insert_id;
			foreach($product_id as $k => $v){
				$data = " form_id = '$id' ";
				$data .= ", product_id = '$product_id[$k]' ";
				$data .= ", qty = '$qty[$k]' ";
				$data .= ", price = '$price[$k]' ";
				$data .= ", type = '2' ";
				$data .= ", stock_from = 'Sales' ";
				// $details = json_encode(array('price'=>$price[$k],'qty'=>$qty[$k]));
				// $data .= ", other_details = '$details' ";
				$data .= ", remarks = 'Stock out from Sales-".$ref_no."' ";

				$save2[]= $this->db->query("INSERT INTO inventory set ".$data);
			}
			if(isset($save2)){
				return $id;
			}
		}else{
			$save = $this->db->query("UPDATE sales_list set ".$data." where id=".$id);
			$ids = implode(",",$inv_id);
			$this->db->query("DELETE FROM inventory where type = 2 and form_id ='$id' and id NOT IN (".$ids.") ");
			foreach($product_id as $k => $v){
				$data = " form_id = '$id' ";
				$data .= ", product_id = '$product_id[$k]' ";
				$data .= ", qty = '$qty[$k]' ";
				$data .= ", price = '$price[$k]' ";
				$data .= ", type = '2' ";
				$data .= ", stock_from = 'Sales' ";
				// $details = json_encode(array('price'=>$price[$k],'qty'=>$qty[$k]));
				// $data .= ", other_details = '$details' ";
				$data .= ", remarks = 'Stock out from Sales-".$ref_no."' ";

				if(!empty($inv_id[$k])){
					$save2[]= $this->db->query("UPDATE inventory set ".$data." where id=".$inv_id[$k]);
				}else{
					$save2[]= $this->db->query("INSERT INTO inventory set ".$data);
				}
			}
			if(isset($save2)){
				return $id;
			}
		}
	}
	function delete_sales(){
		extract($_POST);
		$del1 = $this->db->query("DELETE FROM sales_list where id = $id ");
		$del2 = $this->db->query("DELETE FROM inventory where type = 2 and form_id = $id ");
		if($del1 && $del2)
			return 1;
	}
}