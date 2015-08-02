<?php require_once("db_connection.php"); ?>
<?php require_once("country_functions.php"); ?>
<?php $division_set = get_division_name(); ?>
<?php while($division = mysqli_fetch_assoc($division_set)){ ?>
<?php $district_array = find_district_for_division($division["id"]);   ?>
<?php 
    $total_district = mysqli_num_rows($district_array);
?>
<?php } ?>
<?php //$upazila_array = find_upazila_for_district($district["id"]); ?>	


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table Structure</title>
</head>
<body>
	<table border="1" style="border-color:Aqua;height=100%;width=100%">
		<tr>
			<th>Division</th>
			<th>District</th>
			<th>Upazila</th>
		</tr>
		<?php $division_set = get_division_name(); ?>
		<?php while($division = mysqli_fetch_assoc($division_set)){ ?>
		<?php $district_array = find_district_for_division($division["id"]);   ?>
		<?php $total_district = mysqli_num_rows($district_array); ?>
		<tr>
			<!-- <td rowspan="<?php echo $total_district;?>"><?php echo $division["name"]; ?></td> -->
			<td><?php echo $division["name"]; ?></td>
			<td></td>
			<td></td>
		</tr>
			<?php //$district_array = find_district_for_division($division["id"]);   ?>
			<?php while($district = mysqli_fetch_assoc($district_array)){ ?>
		<tr>
			<td></td>
			<td><?php echo $district["name"]; ?></td>
			<td></td>
		</tr>
			<?php $upazila_array = find_upazila_for_district($district["id"]); ?>
			<?php while($upazila = mysqli_fetch_assoc($upazila_array)){ ?> 
		<tr>
			<td></td>
			<td></td>
			<td><?php echo $upazila["name"]; ?></td>
		</tr>
			<?php } ?>
			<?php } ?>
	  <?php } ?>

		
	  <?php //} ?>





















		<!-- <tr>
			<td>Chittagong</td>
			<td>Raujan <br> Bashkali <br> Doublemouring </td>
		</tr>
		<tr>
			<td>Comilla</td>
			<td>Buricahng <br> Chauddagram <br> Padua </td>
		</tr> -->
	</table>
</body>
</html>