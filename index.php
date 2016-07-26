<?php 
	
	session_start();
	require"functions.php"; 

	if( $_SERVER['REQUEST_METHOD'] == 'POST'){
		//COLLECT NUMBER
		
		$roll = $_POST['roll'];
		$query = $conn->prepare('SELECT * FROM result WHERE roll = :roll');
		$query->bindParam(':roll', $roll, PDO::PARAM_INT);
		$query->execute();
		
		while( $row = $query->fetch() ){
			$sroll = $row['roll'];			 
		}
		//VALIDATE NUMBER
		if( isset($sroll) && $roll == $sroll && isset($roll) ){
			header('location:view.php');
			$view = 'view.php';
			$_SESSION['roll'] = $roll;
		}else{
			$error = "Roll No Does'nt Match" ;
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Result</title>
	<style>
		body {background: #E6E6E6;}
		.container{width:960px; margin:0 auto; margin-top:15%;}
		ul{list-style:none; margin:0; padding:0;}
		li{margin-bottom:20px;}
		#roll {border: none;background: red;color: white; border:1px solid black;}
		form {margin-left: 243px;margin-top: 50px;}
		#submit {background: red;border: medium none;color: white;cursor: pointer;margin-left: 64px;padding: 10px 5px;}
		p {color: red;font-size: 20px;font-style: italic;margin-left: 133px;}
	</style>
</head>
<body>
	<div class="container">
		<h1>Input Your Roll Number.. Roll No must be 1001 to 1010</h1>
		<form action="" method="POST" >
			<ul>
				<li>
					<label for="roll">Enter Your Roll Number</label>
					<input type="number" name="roll" id="roll">
				</li>
				<li>
					<input type="submit" value="Search Your Result" id="submit">
				</li>
			</ul>
			<p><?php if( isset($error) ){echo $error;} ?></p>
		</form>
	</div>
</body>
</html>