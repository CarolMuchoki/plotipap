<?php
session_start();
$data = $_POST;
$unitId = $data['unitId'];
$cost = $data['cost'];

$unitsArray = isset($_SESSION['units']) ? $_SESSION['units'] : [];

if(!isset($_SESSION['total'])){
	$_SESSION['total'] = 0;
}
if(array_key_exists($unitId,$unitsArray)){	
	unset($unitsArray[$unitId]);
	$_SESSION['total'] -= $cost;
	$_SESSION['units'] = $unitsArray;
	die(json_encode(array( 'resp' => "Removed from cart",'total' => $_SESSION['total'])));
}else{
	$unitsArray[$unitId] = $cost;
	$_SESSION['total'] += $cost;
	$_SESSION['units'] = $unitsArray;
	die(json_encode(array( 'resp' => "Added to cart",'total' => $_SESSION['total'])));
}