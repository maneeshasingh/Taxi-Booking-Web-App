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
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true" type="text/javascript"></script>
<script src="map2.js" type="text/javascript"></script>
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
table{
  border:1px solid black;
  background-color:#D0D0D0;
  
  font-size: 15px;
  text-align: center;
  table-layout: fixed;
}
td{
  border:1px solid black;
  font-size:12px;
  padding-top: 3px;
  padding-bottom: 3px;
  padding-left: 3px;
  padding-right: 3px;
}
</style>
<title>CabsOnline login page</title>
</head>
<body onLoad="load()" onUnload="GUnload()">
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
<h3><font color="#838383">Taxi Rates Melbourne</font></h3>
<h3>Peak Rates(05:00-23:59)</h3><left>
<table>
  
  <tr><th>Flagfall</th><th>Distance Rates</th><th>Booking Fee</th></tr>
   <tr><td>$3.20</td><td>$1.617/km</td><td>$2.00</td></tr></table>
   <h3>Off Peak Rates(24:00-04:59)</h3>
  <table>
  <tr><th>Flagfall</th><th>Distance Rates</th><th>Booking Fee</th></tr>
   <tr><td>$3.20</td><td>$1.9404/km</td><td>$2.00</td></tr>
</table>
Enter your pickup address here:<input id="address" name="address" type="text" size="50"/>
Enter your destination address here:<input id="destination_address" name="address" type="text" size="50"/>
    <input type="button" onClick="addMarker()" value="search" />
    <div id="map" style="width: 600px; height: 500px"></div>
  <span id="markerConfirm" />
<!-- Footer-->

<hr>
&copy; Copyright 2015 - Manisha
</div>

</body>
</html>
