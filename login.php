<!--
  Author-Manisha
  Function: Interface for customer login
-->
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0
sTRICT//EN"
"http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
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
   font-size: 1.5em;
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
  height:250px;
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

.barlink
{
    padding: 0px 30px; font-family: arial; color: #505050; text-decoration: none; font-weight: bold; margin: 1px; font-size: 16px;
    margin-top: 10px;
    display: inline-block;
}
.barlink:visited
{
    color: #cfcfcf;
}
.barlink:hover
{
    color: #ffffff;
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
 margin-top: 12px;
}
.error
{
  color: #FF0000;
}

</style>
<title>CabsOnline login page</title>
</head>
<body>
<div id="wrapper">
<img src="taxi.gif" alt="CabsOnline logo" wid border="0" align="center" width="75" height="75">
<h1><font color="#838383" size="20"> CabsOnline</font></h1>
</div>
<br>
<br>
<div style="position: relative; width: 100%">
<center>
  <nav>
    <ul>
      <li><a href="register.php">Home</a></li>
       <li><a href="#">About Us</a></li>
      <li><a href="#">Login</a>
      <ul>
        <li><a href="login.php">Customer Login</a></li>
        <li><a href="#">Admin Login</a></li>
        </li>
      </ul>
    </li>
    <li><a href="fares.php">Taxi Rates</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
</nav>
<hr>
<h3><i>Please fill the fields below to login</i></h3>
<h2><font color="#838383">Login</font></h2>
<!--php script-->
<?php
$emailErr = $passwordErr="";
if ($_SERVER['REQUEST_METHOD'] == 'POST')

   {
    //form input checks
     $errors=0;
     $email="";
   if(empty($_POST['Email']))
      {
         ++$errors;
         $emailErr="Enter e-mail address.";
         $email="";
      }
   else
      {
         $email=$_POST['Email'];
      }
if(empty($_POST['Password']))
  {
     ++$errors;
     $passwordErr="Enter password.";
     $Password="";
  }
else
  {
    $Password=$_POST['Password'];
  }
if($errors==0)
  {
    //Establish DataBase Connection
       $DBConnect=@mysql_connect("mysql17.000webhost.com","a5949855_vishal","vishal81");
       if($DBConnect===FALSE){
       echo "<p>not connected to database server.";
      ++$errors;
    }
    else
    {
       $DBName="a5949855_booking";
       $result=@mysql_select_db($DBName,$DBConnect);
          if($result===FALSE)
           {
            echo"unable to connect to database";
            ++$errors;
           }
     }
  }
     $tablename="customer";
     if($errors==0)
       {  
        //To check email and password availability in customer table
        $SQLstring="SELECT count(*) FROM $tablename WHERE Email='$email' AND Password='$Password'";
        $QueryResult=@mysql_query($SQLstring, $DBConnect);
        $QueryResult=mysql_query($SQLstring) or die(mysql_error());
        $Row=mysql_fetch_row($QueryResult);
    if($Row[0]>0)
       {
        ?>
         <form>
         <h2> <a href="booking.php"><u>click here to proceed to Booking page..</u></a></h2>
         </form>
         <?php
       }
    else
      {
         echo"<p>the entered email and password is invalid, try again </p>";
         ++$errors;
      } 
    if($errors>0)
      {
        echo"<p> please fix the errors</p>";
      }

//close database connection
mysql_close($DBConnect);
}
}
?>
<form id="simpleform" method="post" action="login.php">
<p><span class="error">* required field.</span></p>
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
<div id="theSubmit">
<button class="button">Submit</button>
</div>
<h3> Not registered? <a href="register.php?content=register"><u>Register Here</u></a></h3>
</form>
<br>
<br>
<br>
<!-- Footer-->

<hr>
&copy; Copyright 2015 - Manisha
</div>

</body>
</html>

