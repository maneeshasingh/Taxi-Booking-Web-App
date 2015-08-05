<!-- 
  Author-Manisha
  Function:Interface for admin login
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
<title>CabsOnline admin page</title>
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
      <li><a href="#">Home</a></li>
       <li><a href="#">About Us</a></li>
      <li><a href="#">Login</a>
      <ul>
        <li><a href="#">Customer Login</a></li>
        <li><a href="#">Admin Login</a></li>
        </li>
      </ul>
    </li>
    <li><a href="fares.php">Taxi Rates</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
</nav>
<hr>
<h3><i>Please fill the fields below to complete your registration</i></h3>
<h2><font color="#838383"> Admin </font></h2>
<h2>1. Click below button to search for all unassigned booking requests with a pick-up time within 2 hours.</h2>
<form method="POST" action="admin.php">
<input type="submit" value="List all" name="list">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
              //Establish DataBase connection and select the DataBase
              $DBConnect = @mysqli_connect("mysql17.000webhost.com","a5949855_vishal","vishal81")
              Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ".
              mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

              //SQL query to concatenate pick_up address and select booking requests within 2 hours.
              $SQLstring = "SELECT booking_no,customer_name,passenger_name,phone, CONCAT(unit_no ,'/',street_no,',',street_name,',' ,suburb) AS pickup_address, destination_suburb, CONCAT(pickup_date,'  ', pickup_time) AS pickup_date_time FROM booking WHERE pickup_date= CURDATE() AND pickup_time < DATE_ADD(NOW(), INTERVAL 2 HOUR)"; 
              $QueryResult = @mysqli_query($DBConnect, $SQLstring) Or die ("<p>Unable to query the table.</p>"."<p>Error code ".mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";   
               
              //Create table frame
              echo "<table width='100%' border='1'>";
              echo"<table border='1' width='100%'>\n";
              echo"<tr><th> booking_no</th>". 
              "<th> customer_name</th>".                                 
              "<th> passenger_name</th>".                   
              "<th>phone </th>".
              "<th>pickup_address</th>".
              "<th> destination_suburb</th>".

              //Fetch data into table
              $Row = mysqli_fetch_row($QueryResult);
        while($Row)
        {
	         echo"<tr><td>{$Row[0]}</td>";
	         echo"<td>{$Row[1]}</td>";
	         echo"<td>{$Row[2]}</td>";
	         echo"<td>{$Row[3]}</td>";
	         echo"<td>{$Row[4]}</td>";
	         echo"<td>{$Row[5]}</td>";
	         echo"<td>{$Row[6]}</td></tr>\n";
             $Row = mysqli_fetch_row($QueryResult);
        }

             echo"</table>\n";

 ?>      
             <h2>2. Input a reference number below and click "update" button to assign a taxi to that request</h2>
             <form method="POST" action="admin.php">
             Reference a number: <input type="text" name="booking_no">
             <input type="submit" value="Update" name="update">
             </form>

<?php
        if(isset($_POST['update']))
        {   
              $errors=0;
	        if(empty($_POST['update']))
              {
                  echo "<p>please enter number for update</p>";
                  ++$errors;
               }
            else
               {
                  $number=$_POST['booking_no'];
               }
               //update status of corresponding booking no.
                  $SQL = "UPDATE booking SET status='assigned' WHERE booking_no='$_POST[booking_no]' AND status='unassigned'"; 
                  $QueryResult = @mysqli_query($DBConnect, $SQL) Or die ("<p>Unable to query the table.</p>"."<p>Error code ".mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";   
              
             if($errors==0)
               {
                   echo" The booking request no. " .$number." has been properly assigned. "; 
               }
              else
               {
  	              echo"The booking reference is not correct"; 
               } 

        }
        //close database connection
               mysqli_close($DBConnect);
}
?>
</body>
</html>