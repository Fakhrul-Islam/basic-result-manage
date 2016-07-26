<?php 
	
	session_start();
	if( !isset($_SESSION['roll']) ){
		header('Location:index.php');
	};
	require"functions.php";
 	$roll = $_SESSION['roll'];
 	session_destroy();

 	$query = $conn->prepare('SELECT * FROM result WHERE roll = :roll');
		$query->bindParam(':roll', $roll, PDO::PARAM_INT);
		$query->execute();
		
		while( $row = $query->fetch() ){
			$sroll = $row['roll'];
			$sname = $row['name'];	
			$sgpa = $row['gpa'];		 
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students Result</title>
	<style>
		body {background: #E6E6E6;}
		.container{width:960px; margin:0 auto; margin-top:15%;}
		ul{list-style:none; margin:0; padding:0;}
		li{margin-bottom:20px; font-size:20px;}
		span{font-weight: bold;}
		a {background: red none repeat scroll 0 0;border: 2px solid black;color: white;  padding: 8px;text-decoration: none;}
	</style>
</head>
<body>
	<div class="container">
		<h1>Student Result</h1>
		<ul>
			<li>Student Name : <span><?php echo $sname; ?></span></li>
			<li>Student Roll : <span><?php echo $sroll; ?></span></li>
			<li>Student Result : GPA-<span><?php echo $sgpa; ?></span></li>
			<li>Student Grade : <span><?php echo grade($sgpa); ?></span></li>
		</ul>
		<a href="back.php">Back To Search Page</a>
	</div>
</body>
</html>