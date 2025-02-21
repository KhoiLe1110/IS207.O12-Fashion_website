<?php 
	include 'lib/session.php';
	Session::init();
?>
<?php
	include_once('lib/database.php');
	include_once('helpers/format.php');
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$product = new product();
	$cs = new customer();
	$blog = new blog();
?>
<!DOCTYPE html>
<html lang="en">
<head>