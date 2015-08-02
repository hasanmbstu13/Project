<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php
	if(isset($_POST['submit'])){
		$division_name = mysql_prep($_POST["division_name"]);

		$query =  "INSERT INTO divisions (";
		$query .= "name";
		$query .= ") VALUES (";
		$query .= "'{$division_name}'";
		$query .= ")";	
		$result = mysqli_query($connection, $query);

		if($result){
			$_SESSION["message"] = "New division added successfully";
			redirect_to("index.php");
		} else {
			echo "Division creation failed";
		}
	}else {

	} 
?>
<?php include("./includes/layouts/header.php"); ?>
<div id = "main">
	<div id = "navigation">
		
	</div>
	<div id = "page">
		<h2>Create Division</h2>
		<form action="division.php" method="post">
			<p>Division Name:
				<input type="text" name="division_name" value="" />
			</p>
			<input type="submit" name="submit" value="Create Division" />&nbsp;
			<button formaction="index.php">Cancel</button>
		</form>
	</div>
</div>
<?php include("./includes/layouts/footer.php") ?> 