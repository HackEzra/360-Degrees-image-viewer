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

  <title>360 Degrees Image Viewer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
     <nav class="navbar navbar-expand-sm bg-info navbar-dark">
     <ul class="navbar-nav">
      <li class="nav-item active">
      <a><h1>360 Degrees Image Viewer</h1></a>
      </li>
      </ul>

      
  </nav>
<div class="container-fluid">   <div class="row">
<?php
				  if(isset($_REQUEST['submit']))
				  {
					  extract($_REQUEST);
					   $error=$_FILES["fileToUpload"]["error"];
					   $image=$_FILES["fileToUpload"]["name"];
                       $type=$_FILES["fileToUpload"]["type"];
                       $size=$_FILES["fileToUpload"]["size"];
                       $tmp_name=$_FILES["fileToUpload"]["tmp_name"];
                       move_uploaded_file($tmp_name,"images/$image");
					   iud("INSERT INTO `img`(`image_name`, `short_descirption`) VALUES ('$image','')");
				  }
					   ?>
					   <br><br><br>
   <form  method="post" enctype="multipart/form-data">
      
	
	   <div class="col-lg-3"></div>
	   <div class="col-lg-6">
	   <div class="form-group"> Select image to upload:
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"></div>
    <input type="submit" class="btn btn-info" value="Upload Image" name="submit"></div>
   </form> </div>
    <br><br><br>

<div style="margin:20px">
   <table class="table">
   <tr>
       <th>Image</th>
       <th>Description</th>
       <th>View</th>
       <th>Delete</th>
    </tr>
	
	<?php
		 $query = select("SELECT * FROM img");
		 while($r=mysqli_fetch_array($query))
		{
					extract($r);
			?>	
    <tr>
      <td><?=$image_name?></td>
      <td><?=$short_descirption?></td>
      <td><a href="360.php?id=<?=$id?>"><button class="btn btn-success">View</button></a></td>
      <td><a href="delete.php?id=<?=$id?>"><button class="btn btn-danger">Delete</button></a></td>
      
    </tr>
  
  </tr>
  <?php
		}
		
		?>
</table>
</div>
</div>
<center>
<li><a href="logout.php">Logout</a></li>
</center>
<br><br><br><br>
<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="#"> 360 Degrees Image Viewer</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
