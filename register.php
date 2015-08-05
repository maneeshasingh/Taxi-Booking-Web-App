<!--
  Author-Manisha
  Function: Interface for customer registration 
-->
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0sTRICT//EN"
"http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<style type="text/css">
body
{
    background-color: #FFFFFF;
    margin: 2px 0 0 0;
    padding: 0px;
    font-family: 'Open Sans', sans-serif;
    font-size: 11pt;
}
h1
{
    font-size: 1.8em;
    color: #333;
    margin-right: 12px;
    text-align:left;
    margin-top:0;
}
h2
{
  text-align:center;
  font-size:1.8em;
  color:#333;
  margin:0;
}
h3
{
  text-align:center;
  font-size:1.1em;
  margin:20px;
}
label
{
float:left;
width:150px;
top:200px;
text-align: right;
padding-right:12px;
padding-left:12px;
margin-top:12px;
clear:left;
margin-right:12px;
}
img
{
  float:left;
  margin-top:6px;
}
#simpleform
{
  
  width:500px;
  height:300px;
  left:400px;
  margin-top:0;
  background-color:#D0D0D0;
  border-radius:10px;
  text-align:left;
}
.navbar
{
    width: 905px;
    height: 32px;
    margin-top: 0;
    border-radius: 8px;
    background-color:#FFFF33;
}
nav ul ul 
{
  display: none;
}

  nav ul li:hover > ul 
{
    display: block;
}
  nav ul 
  {
  background: #FFFF33; 
  background: linear-gradient(top, #FFFF33 0%, #FFFF33 100%);  
  background: -moz-linear-gradient(top, #FFFF33 0%, #FFFF33 100%); 
  background: -webkit-linear-gradient(top, #FFFF33 0%,#FFFF33 100%); 
  box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
  padding: 0 20px;
  border-radius: 10px;  
  list-style: none;
  position: relative;
  display: inline-table;
}
  nav ul:after 
  {
    content: ""; clear: both; display: block;
  }
  nav ul li 

{
  float: left;
}
  nav ul li:hover {
    background:#FFFF33;
    background: linear-gradient(top, #FFFF33 0%, #FFFF33 40%);
    background: -moz-linear-gradient(top, #FFFF33 0%,#FFFF33 40%);
    background: -webkit-linear-gradient(top, #FFFF33 0%,#FFFF33 40%);
  }
    nav ul li:hover a
    {
      color: #fff;
    }
  
  nav ul li a {
    display: block; padding: 25px 40px;
    color: #838383; text-decoration: none;
  }
  nav ul ul {
  background: #838383; border-radius: 0px; padding: 0;
  position: absolute; top: 100%;
}

#theSubmit
{
  margin-left:150px;
  padding:15px;

}
.button{
  background-color:#FFFF33;
  margin-top:12px; 
}
.resizedTextbox {width: 150px; height: 15px;
 margin-top: 12px;}
 .error 
 {
  color: #FF0000;
 }
</style>
<title>CabsOnline registration page</title>
</head>
<body>
<br>
<div id="wrapper">
<img src="taxi.gif" alt="CabsOnline logo" wid border="0" align="center" width="75" height="75">
<h1><font color="#838383" size="30"> CabsOnline</font></h1>
</div>
<div style="position: relative; width: 100%">
<center>
  <nav>
    <ul>
      <li><a href="register.php">Home</a></li>
       <li><a href="admin.php">About Us</a></li>
      <li><a href="">Login</a>
      <ul>
        <li><a href="login.php">Customer Login</a></li>
        <li><a href="admin.php">Admin Login</a></li>
        
      </ul>
    </li>
    <li><a href="fares.php">Taxi Rates</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
</nav>
<hr>
<h3><i>Please fill the fields below to complete your registration</i></h3>
<h2><font color="#838383"> Registration</font></h2>
<?php
$nameErr = $emailErr= $passwordErr=$cpasswordErr=$phoneErr="";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
            $errors=0;
    if(empty($_POST['Name']))
      {
            ++$errors;
            $nameErr="Enter First Name";
      }
    else
      {
            $name=$_POST['Name'];
      }
      //Email ckeck
    if (empty($_POST['Email'])) 
      {
             ++$errors;
             $emailErr="Enter e-mail address.";
      }
     else
      {
              $email=$_POST['Email'];
      }
      //Password check
     if (empty($_POST['Password'])) 
      {
              ++$errors;
              $passwordErr="Enter password.";
              $Password = "";
      }
     else
              $Password = stripslashes($_POST['Password']);
     if (empty($_POST['Cpassword'])) 
       {
              ++$errors;
              $cpasswordErr="Enter password.";
              $Cpassword = " ";
       }
     else
              $Cpassword = stripslashes($_POST['Cpassword']);
      if ((!(empty($Password))) && (!(empty($Cpassword)))) 
        {
              if (strlen($Password) < 6)
                {
                   ++$errors;
                   $passwordErr= "The password is too short.";
                   $Password = "";
                   $Cpassword = "";
                }
                if ($Password <> $Cpassword) {
                      ++$errors;
                      $passwordErr="The passwords do not match.";
                      $Password = "";
                      $Cpassword = "";
                  }
         }

     if(empty($_POST['Phone']))
     {
            ++$errors;
            $phoneErr="Enter phone no.";
            $phone="";
     }
     else
     {
           $phone=$_POST['Phone'];
      }
   //Establish DataBase Connection
   if($errors==0)
    {
       $DBConnect=@mysql_connect("mysql17.000webhost.com","a5949855_vishal","vishal81");
       if($DBConnect==FALSE){
       echo "<p>Sorry, not connected to database server.";
       ++$errors;
    }

    else
    {
       $DBName="a5949855_booking";
       $result=@mysql_select_db($DBName,$DBConnect);
       if($result==FALSE)
        {
          echo"unable to connect to database";
          ++$errors;
        }
    }
}
    $tablename="Customer";
	 if($errors==0)
	 {	
    //check email already assigned or not
	     $SQLstring="SELECT count(*) FROM $tablename WHERE Email=$email";
       $QueryResult=@mysql_query($SQLstring, $DBConnect);
	 if($QueryResult!=FALSE)
   {
		   $Row=mysql_fetch_row($QueryResult);
       if($Row[1]>0)
        {
				   ++$errors;
			  }
	 }
	     //Insert data into customer table
       $SQLstring="INSERT INTO $tablename (Name,Email,Password,Phone) VALUES('$name','$email','$Password','$phone')";
       $QueryResult=@mysql_query($SQLstring,$DBConnect);
    if($QueryResult==FALSE)
        {
            echo "the entered email is already assigned.";
            ++$errors;
         }
            mysql_close($DBConnect);
         }
   if($errors==0)
   {
         echo "Thanks $name, click LOGIN to login";
   }
}
?>
<form id="simpleform" method="post" action="register.php">
 <p><span class="error">* required field.</span></p>
<div>
<label for="myName">Name:</label>
<input type="text" name="Name" class="resizedTextbox">
<span class="error"> * <?php echo $nameErr;?> </span>
</div>
<div>
<label for="email">Email:</label>
<input type="text" name="Email" class="resizedTextbox">
<span class="error"> * <?php echo $emailErr;?> </span>
</div>
<div>
<label for="password">Password:</label>
<input type="password" name="Password" class="resizedTextbox">
<span class="error"> * <?php echo $passwordErr;?> </span>
</div>
<div>
<label for="cpassword">Confirm Password:</label>
<input type="password" name="Cpassword" class="resizedTextbox">
<span class="error"> * <?php echo $cpasswordErr;?> </span>
</div>
<div>
<label for="phone">Phone:</label>
<input type="text" name="Phone" class="resizedTextbox">
<span class="error"> * <?php echo $phoneErr;?></span>
</div>
<div id="theSubmit">
<button class="button" onClick='login.php'>Submit</button>
</div>
<h3>Already registered? <a href="login.php?content=login"><u>Login Here</u></a></h3>
</form>
<br>
<!-- Footer-->
<hr>
&copy; Copyright 2015 - Manisha Singh
</div>
</body>
</html>


