<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php
	if(isset($_POST['submit'])){
		$division_id = $_POST["division_name"];
		$district_name = mysql_prep($_POST["district_name"]);

		$query =  "INSERT INTO districts (";
		$query .= "division_id,name";
		$query .= ") VALUES (";
		$query .= "{$division_id},'{$district_name}'";
		$query .= ")";	
		$result = mysqli_query($connection, $query);

		if($result){
			$_SESSION["message"] = "New district added successfully";
			redirect_to("index.php");
		} else {
			echo "District creation failed";
		}
    }else {

    } 
?>
<?php include("./includes/layouts/header.php"); ?>
<div id = "main">
	<div id = "navigation">
		
	</div>
	<div id = "page">
		<h2>Create District</h2>
		<form action="district.php" method="post">
			<p>Division List:
				<select name="division_name">
					<?php
					$division_set = get_all_division();
					while($division = mysqli_fetch_assoc($division_set)){
						echo "<option value=".$division["id"].">".$division["name"]."</option>";						
					}
					?>
				</select>
			</p>
			<p>Enter New District:
				<input type="text" name="district_name" value="" />
			</p>
			<input type="submit" name="submit" value="Create District" />&nbsp;
			<button formaction="index.php">Cancel</button>
		</form>
	</div>
</div>
<?php include("./includes/layouts/footer.php") ?> 