<?php
	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}

	function mysql_prep($string){ 
		global $connection;

		$escaped_string = mysqli_real_escape_string($connection,$string);
		return $escaped_string;
	}

	function confirm_query($result_set){ 
		global $connection;

		if(!$result_set){
			die("Database query failed:".mysqli_error($connection). __LINE__ .' in ' .__FILE__ );  
		}
	}

	function get_all_division()
	{
		global $connection;

		$query =  "SELECT * ";
		$query .= "FROM divisions ";
		$query .= "ORDER BY name";
		$divisions = mysqli_query($connection,$query);
		confirm_query($divisions);
		return $divisions;
	}

	function get_all_districts()
	{
		global $connection;

		$query =  "SELECT * ";
		$query .= "FROM districts ";
		$query .= "ORDER BY name";
		$districts = mysqli_query($connection,$query);
		confirm_query($districts);
		return $districts;
	}

	function find_district_for_division($division_id)
	{
		global $connection;

		$query =  "SELECT  * ";
		$query .= "FROM districts ";
		$query .= "Where division_id = {$division_id} ";
		$query .= "ORDER BY name";
		$districts = mysqli_query($connection,$query);
		confirm_query($districts);
		return $districts;

	}

	function get_all_upazilas()
	{
		global $connection;

		$query =  "SELECT * ";
		$query .= "FROM upazilas ";
		$query .= "ORDER BY name";
		$districts = mysqli_query($connection,$query);
		confirm_query($districts);
		return $districts;
	}

	function find_upazila_for_district($district_id)
	{
		global $connection;

		$query =  "SELECT  name ";
		$query .= "FROM upazilas ";
		$query .= "Where district_id = {$district_id} ";
		$query .= "ORDER BY name";
		$upazilas = mysqli_query($connection,$query);
		confirm_query($upazilas);
		return $upazilas;

	}

?>