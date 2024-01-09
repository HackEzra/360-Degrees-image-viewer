<?php
require_once"dbconfig.php";

$i=iud("delete from img where id='".$_REQUEST['id']."'");
if($i==1)
{
	echo"<script>alert('Deleted');
	window.location='index.php';	</script>";
}
else
{
	echo"<script>alert('Somthing Wrong');
	window.location='index.php';	</script>";
}



?>