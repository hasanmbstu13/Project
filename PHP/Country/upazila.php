<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php
	if(isset($_POST['submit'])){
		$district_id = $_POST["district"];
		$upazila_name = mysql_prep($_POST["upazila_name"]);

		$query =  "INSERT INTO upazilas (";
		$query .= "district_id,name";
		$query .= ") VALUES (";
		$query .= "{$district_id},'{$upazila_name}'";
		$query .= ")";	
		$result = mysqli_query($connection, $query);

		if($result){
			$_SESSION["message"] = "New upazila added successfully";
			redirect_to("index.php");
		} else {
			echo "Upazila creation failed";
		}
	}else {

	} 
?>
<?php include("./includes/layouts/header.php"); ?>
<div id = "main">
	<div id = "navigation">

	</div>
	<div id = "page">
		<h2>Create Upazila</h2>
		<form action="upazila.php" method="post">
			<p>District:
				<select name="district">
					<?php
					$districts = get_all_districts();
					while($district = mysqli_fetch_assoc($districts)){
						echo "<option value=".$district["id"].">".$district["name"]."</option>";						
					}
					?>
				</select>
			</p>
			<p>Enter New Upazila:
				<input type="text" name="upazila_name" value="" />
			</p>
			<input type="submit" name="submit" value="Create Upazila" />&nbsp;
			<button formaction="index.php">Cancel</button>
		</form>
	</div>
</div>
<?php include("./includes/layouts/footer.php") ?> 