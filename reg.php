
<?php require_once"dbconfig.php";?>
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

<!-- single -->
<div class="blog-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-center text-bl font-weight-bold mb-1">Registration </h3>
			<div class="row blog-content pt-lg-3">
				<!-- left side -->
				<div class="col-lg-2 left-blog-info text-left"></div>
				<div class="col-lg-8 left-blog-info text-left">
					
					
					<div class="comment-top mt-5">
						<h4></h4>
						<div class="comment-bottom">
							<form action="myphp.php" method="post">
								<div class="form-group">
									<input class="form-control" type="text" name="name" placeholder="Name" required="">
								</div>
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="Email" required="">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="mobile" placeholder="Mobile" required="">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="password" placeholder="Password" required="">
								</div>
								<button type="submit" name="submit" class="btn btn-primary submit">Submit</button>
							</form>
						</div>
					</div>
				</div>
				<!-- //left side -->
				<!-- right side -->
						
						
						
					</div>
				</div>
				<!-- //right side -->
			</div>
		</div>
	</div>
	<!-- //single -->


</div>

<center>
<div>
    <a href="login.php"> Login</a>
</div>
</center>


</div><br><br><br><br>
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
