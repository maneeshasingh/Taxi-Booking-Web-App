<!--
  Author- Manisha
  Function: Interface for taxi booking
-->
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0
sTRICT//EN"
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
  height:450px;
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
.resizedTextbox 
{
  width: 150px; height: 15px;
 margin-top: 12px;
}
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
       <li><a href="#">About Us</a></li>
      <li><a href="#">Login</a>
      <ul>
        <li><a href="login.php">Customer Login</a></li>
        <li><a href="admin.php">Admin Login</a></li>
        </li>
      </ul>
    </li>
    <li><a href="fares.php">Taxi Rates</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
</nav>
<hr>
<h3><i>Please fill the fields below to complete your registration</i></h3>
<h2><font color="#838383"> Booking</font></h2>

<!--php script-->

<?php
$nameErr = $emailErr= $passwordErr=$cpasswordErr=$phoneErr="";
//Form input checks
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
       $errors=0;
     if(empty($_POST['cname']))
       {
            ++$errors;
           $nameErr="Enter Name";
       }
    else
       {
          $cname=$_POST['cname'];
       }
   if(empty($_POST['name']))
       {
          ++$errors;
          $nameErr="Enter Name";
       }
    else
      {
           $name=$_POST['name'];
      }
    if(empty($_POST['phone']))
       {
          ++$errors;
          echo"<p> please enter contact no.</p>\n";
          $phone="";
       }
    else
       {
         $phone=$_POST['phone'];
       }
        
     $unit_no=$_POST['unit_no'];
    
  if(empty($_POST['streetnumber']))
     {
        ++$errors;
        echo"<p> please street number</p>\n";
        $streetnumber="";
     }
    else
     {
        $streetnumber=$_POST['streetnumber'];  
     }
  if(empty($_POST['streetname']))
     {
       ++$errors;
       echo"<p> please street name</p>\n";
       $streetname="";
     }
    else
     {
        $streetname=$_POST['streetname'];
     }
 if(empty($_POST['suburb']))
    {
       ++$errors;
       echo"<p> please enter suburb</p>\n";
       $suburb="";
    }
    else
    {
       $suburb=$_POST['suburb'];
    }
if(empty($_POST['dsuburb']))
    {
      ++$errors;
      echo"<p> please enter destination suburb</p>\n";
      $dsuburb="";
    }
    else
    {
      $dsuburb=$_POST['dsuburb'];
    }
if(empty($_POST['date']))
    {
    ++$errors;
    echo"<p> please enter the date </p>\n";
    $date="";
    }
    else
    {
       $date=$_POST['date'];
    }
 if(empty($_POST['time']))
     {
       ++$errors;
     echo"<p> please enter time </p>\n";
       $time="";
     }
    else
     {
     	$time=$_POST['time'];
     }

   if($errors==0)
    {
    	//Establish DataBase Connection
     $DBConnect=@mysql_connect("mysql17.000webhost.com","a5949855_vishal","vishal81");
        if($DBConnect==FALSE)
         {
           echo "<p>not connected to database server.";
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
     //Insert data into booking table
    $tablename="booking";
    if($errors==0)
     {
          $SQLstring="INSERT INTO $tablename (customer_name,passenger_name,phone,unit_no,street_no,street_name,suburb,destination_suburb,pickup_date,pickup_time,status) VALUES ('$cname','$name','$phone','$unit_no','$streetnumber','$streetname','$suburb','$dsuburb','$date','$time','unassigned')";
          $QueryResult=@mysql_query($SQLstring,$DBConnect);
          if($QueryResult===FALSE)
            {
              echo "Query Error!!!";
              ++$errors;
            }
          else
           {
           	//Conformation details
             $booking_no=mysql_insert_id($DBConnect);
            echo "<p>Hi,". $cname." Your booking has been done and booking reference number is:".$booking_no ."</p>\n";
            $date = date("F j, Y, g:i a");
            echo "<p>Date/Time:".$date."</p>\n";
            echo "<p>Status:  Unassigned </p>\n";
            //send email 
            $SQLstring1= "SELECT customer.Email  FROM customer INNER JOIN booking WHERE customer.Name=booking.customer_name AND booking.booking_no='".$booking_no."'";
            $QueryResult1=@mysql_query($SQLstring1,$DBConnect);
            $row = mysql_fetch_row($QueryResult1);
            $Email=$row[0];
            $To =$Email;
            $Subject="Your booking request with CabsOnline!";
            $Message="Dear".$cname.", Thanks for booking with CabsOnline! Your booking reference number is".$booking_no.". We will pick up the passengers in front of your provided address at".$time."on".$date;
            $Header= "From: booking@cabsonline.com.au";
            $deliver=mail($To,$Subject,$Message,$Header,"-r 4956958@student.swin.edu.au");
    if($deliver)
    {
	      $sent="Your message was successfully sent.";
    }
   else
    {
	      $sent="There was an error in sending your message.";
    }
          echo "Thank you for filling out the booking form,". $cname.$sent; 
    }
    // Close DataBase connection
          mysql_close($DBConnect);
    }
}
?>

<form id="simpleform" method="post" action="booking.php">
<p><span class="error">*required field.</span></p>
<div>
<label for="cname"> Customer name:</label>
<p><input type="text" name="cname" class="resizedTextBox">
<span class="error">*<?php echo $nameErr;?></span></p>
</div>
<div>
<label for="name">Passenger name: </label> 
<p><input type="text" name="name"class="resizedTextBox">
<span class="error">*<?php echo $nameErr;?></span></p>
</div>

<div>
<label for="phone">Contact no. of the passenger:</label>
<p><input type="text" name="phone" class="resizedTextBox">
<span class="error">*<?php echo $phoneErr;?></span>
</div>
<div>
<label for="address"><b>Pickup Address:</b></label></div>
<div>
<p><label for="address">Unit no.:</p></label>
<input type="text" name="unit_no">
</div>
<div>
<label for="address">Street number:</label>
<p><input type="text" name="streetnumber" class="resizedTextBox">
<span class="error">*<?php ?></span></p>
</div>
<div>
<label for="address">Street Name:</label>
<p><input type="text" name="streetname" class="resizedTextBox">
<span class="error">*<?php ?></span></p>
</div>
<div>
<label for="address">Suburb:</label>
<p><input type="text" name="suburb">
<span class="error">*<?php  ?></span></p> 
</div>
<div>
<label for="address">Destination Suburb:</label>
<p><input type="text" name="dsuburb">
<span class="error">*<?php  ?></span></p> 
</div>
<div>
<label for="address">Pickup Date:</label>
<p><input type="text" name="date"><?php echo "(yyyy-mm-dd)"; ?>
<span class="error">*<?php  ?></span>
</p></div>
<div>
<label for="address">Pickup Time:</label>
<p><input type="text" name="time"><?php echo "(2400 hrs)"; ?>
<span class="error">*<?php  ?></span> 
</p></div>
<div>
<p><input type="submit" value="Book" name="book"></p></div>
</form>
</body>
</html>
