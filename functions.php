<?php

$config = array (
		'DB_USER' 	=> 	'root',
		'DB_PASS'	=>	''
	);

try{


$conn = new PDO( 'mysql:host=localhost;dbname=student',$config['DB_USER'],$config['DB_PASS'] );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}catch(PDOException $e){
	echo "ERROR :" . $e->getMessage();
}

//FUNCTION FOR GRADE;
function grade ( $gpa = 3.5 ){
	if($gpa>5 || $gpa<0){
		return "Error Number";
	}elseif( $gpa==5 ){ 
		return 'A+' ;
	}elseif( $gpa >= 4){
		return 'A';
	}elseif( $gpa >= 3.5){
		return 'A-';
	}elseif( $gpa >= 3){
		return 'B';
	}elseif( $gpa >= 2){
		return 'C';
	}elseif( $gpa >= 1){
		return 'D';
	}elseif( $gpa < 1){
		return 'Failed';
	}
}

