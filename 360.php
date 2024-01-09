<?php require_once"dbconfig.php";
if(isset($_SESSION['login']))
{
	
}
else
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>360 Degree View</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/aframe/0.7.1/aframe.min.js"></script>
	<style>
	
	.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}
	</style>
</head>

<body>

 <!-- <a href="index.php"><button class="btn btn-warning"> Back </button></a>  -->
	<a-scene>
	<?php 
	
	$ui=select("select * from img where id='".$_REQUEST['id']."'");
while($l=mysqli_fetch_array($ui))
{
	?>
	<img id="panorama" src="images/<?=$l['image_name']?>"/>
		
	<?php
}
	?>
		<a-sky src="#panorama" rotation="0 -90 0"></a-sky>
	</a-scene>
</body>
</html>