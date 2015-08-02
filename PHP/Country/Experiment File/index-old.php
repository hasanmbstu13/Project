<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>

<?php 
	$division_set = get_division_name();
	$district_set = get_all_districts();
	$upazila_set  = get_all_upazilas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
</head>
		<tr>
			<th>Divisions</th>
			<th colspan="3">Districts</th>
			<th>Upazila</th>
		</tr>
		<?php while($division = mysqli_fetch_assoc($division_set)){ ?>
		<tr>
			<td><?php echo $division["name"]; ?></td>
			<?php $district_array = find_district_for_division($division["id"]); ?>	
			<?php while($district = mysqli_fetch_assoc($district_array)){ ?>
			<td>
			<?php echo $district["name"]; ?> <br>
			<?php //echo nl2br("<br>"); ?>
			</td>
			<?php } ?>
			<!-- <td>Barisal <br>Rajshai <br> Khulna <br></td> 		 -->
			
		</tr>
	<?php  } ?>
	</table>
</body>
</html>