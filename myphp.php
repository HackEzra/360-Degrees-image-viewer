<?php
require_once"dbconfig.php";
require_once"validation.php";

##################################################

if(isset($_REQUEST['submit']))
{
	$name=trim($_REQUEST['name']);
	$mobile=trim($_REQUEST['mobile']);
	$email=trim($_REQUEST['email']);
	$password=trim($_REQUEST['password']);
	//$cpassword=trim($_REQUEST['cpassword']);
	$valid=true;
	$query="INSERT INTO `register`(`name`, `email`, `mobile`, `password`) VALUES
	('$name','$email','$mobile','$password')";
	if(checklength($name,2))
	{
		echo"invalid name";
		$valid=false;
	}
	if(!checkmobile($mobile))
	{
		echo"invalid mobile";
		$valid=false;
	}
	if(!checkemail($email))
	{
		echo"invalid email";
		$valid=false;
	}
	if(checklength($password, 6))
	{
		echo"invalid password";
		$valid=false;
	}
	if($valid)
	{
	$n=iud($query);
	if($n==1)
	{
		echo"<script>alert('Register Success Now You Can Login')
		window.location='index.php';
		</script>";
	}
	else
	{
		echo"<script>alert('Something Wrong')
		window.location='index.php';
		</script>";
	}
	}
	}
###########################################################
	if(isset($_REQUEST['login']))
	{
		
	$email=trim($_REQUEST['email']);
	$password=trim($_REQUEST['password']);
	
	$valid=true;
	$query="select * from register where email='$email' and password='$password'";
	
	if(!checkemail($email))
	{
		echo"invalid email";
		$valid=false;
	}
	if(checklength($password, 6))
	{
		echo"invalid password";
		$valid=false;
	}
	
	if($valid)
	{
	$login_data=select($query);
	$n=mysqli_num_rows($login_data);
	if($n==1)
	{
		while($data=mysqli_fetch_array($login_data))
		{
		extract($data);
		
		}
		
		$_SESSION['id']=$id;
		$_SESSION['name']=$name;
		//$_SESSION['image']=$image;
		$_SESSION['login']="yes";
		
		echo"<script>alert('successful')
		
		window.location='index.php';
		</script>";
	}
	else
	{
		echo"email or password is incorrect";
	}
	}
		
	}

#############################################
if(isset($_REQUEST['change']))
	{
	$userid=$_SESSION['userid'];	
	$oldpassword=trim($_REQUEST['oldpassword']);
	$newpassword=trim($_REQUEST['newpassword']);
	$cpassword=trim($_REQUEST['cpassword']);
	$valid=true;
	$query="update user set password='$newpassword' where password='$oldpassword' and userid='$userid'";
	
	
	if(checklength($oldpassword, 6))
	{
		echo"invalid old password";
		$valid=false;
	}
	if(checklength($newpassword, 6))
	{
		echo"invalid New password";
		$valid=false;
	}
	if($cpassword!=$newpassword)
	{
		echo"both password not matched";
		$valid=false;
	}
	if($valid)
	{
	$n=iud($query);
	
	if($n==1)
	{		
       echo"1";
	}
	else
	{
		echo"something wrong";
	}
	}
		
	}

#######################################################
if(isset($_REQUEST['forget']))
	{
	$email=trim($_REQUEST['email']);

	$time=time();
	$otp=md5($email.$time);
	$valid=true;
	if(strlen($otp)!=32)
		{
			echo "invalid otp";
			$valid=false;
		}
		if(!checkemail($email))
	{
		echo"invalid email";
		$valid=false;
	}
	
	$query="update user set otp='$otp' where email='$email' ";
	
if($valid){
	$n=iud($query);
if($n==1)
{
	echo"1";
}
else
{
	echo"invalid forget password";
}
}
}
	
################################################
if(isset($_REQUEST['reset']))
{
	$otp=trim($_REQUEST['otp']);
	$newpassword=trim($_REQUEST['newpassword']);
	$cpassword=trim($_REQUEST['cpassword']);
	$valid=true;
	if(strlen($otp)!=32)
	{
		echo"invalid otp";
		$valid=false;
	}
	if(checklength($newpassword, 6))
	{
		echo"invalid  New password";
		$valid=false;
	}
	if($cpassword!=$newpassword)
	{
		echo"Password and Confirm Password is not match";
		$valid=false;
	}
	$query="update user set password='$newpassword',otp='' where otp='$otp'";
	
	if($valid)
	{
		$n=iud($query);
	if($n==1)
	{
		echo"1";
	}
	else
	{
		echo "something wrong";
	}
	}
}
###########################################################################
if(isset($_REQUEST['upload']))
{
 
$error=$_FILES["myfile"]["error"];

$name=$_FILES["myfile"]["name"];
$type=$_FILES["myfile"]["type"];
$size=$_FILES["myfile"]["size"];
$tmp_name=$_FILES["myfile"]["tmp_name"];
$userid=$_SESSION['userid'];
	$query="update user set image='$name' where userid='$userid'";

	if(move_uploaded_file($tmp_name,"images/$name"))
	{
	$n=iud($query);
	 if($n==1)
	 {
		 $_SESSION['image']=$name;
		 echo"<script>alert('Image uploaded successfully');
		 window.location='change_image.php';
		 </script>";
	 }
	
	}
	else
	{
		echo"image is not upload";
	}
	
	
	
	
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	










?>