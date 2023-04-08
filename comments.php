<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/mrtasks.js"></script>
	</head>
	<body>
		<?php 
			$conn = db_connect();
			$query = "SELECT * from sweetwater_test";
			$res = $conn->query($query);
			while($data = $res->fetch_array()){
				echo $data['comments'].'<br>';
			}
		?>
	</body>
</html>

<?php
function db_connect(){
	$mysqli = new mysqli('localhost','root','sweet','sweetwater_test');
	if($mysqli){
		return $mysqli;
	}else{
		return false;
	}
}
?>