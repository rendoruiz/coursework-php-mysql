<?php

// prints name of file
$thisFile = basename($_SERVER['PHP_SELF']);
// echo $thisFile;

// prints complete path of file
// $completePath = $_SERVER['PHP_SELF'];
// echo $completePath;

switch ($thisFile){
  case "index.php":
    $thisPageTitle = "Edgar Allen Poe";
    $thisSideBarFile = "includes/summaries/home.html"; // make sure you check your pathing; change file type and formatting if you like.
    break;
  case "berenice.php":
    $thisPageTitle = "EAPoe - Berenice";
    $thisSideBarFile = "includes/summaries/berenice.html";
    break;
  case "amontillado.php":
    $thisPageTitle = "EAPoe - The Cask of Amontillado ";
    $thisSideBarFile = "includes/summaries/amontillado.html";
    break;
  case "maelstrom.php":
    $thisPageTitle = "EAPoe - Descent into the Maelstrom";
    $thisSideBarFile = "includes/summaries/maelstrom.html";
    break;
  case "angel.php":
    $thisPageTitle = "EAPoe - The Angel of the Odd ";
    $thisSideBarFile = "includes/summaries/angel.html";
    break;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title><?php echo $thisPageTitle; ?></title>
<style type="text/css">

html,body {
	font-family: verdana;
	font-size: 13px;
	margin:0px;
	background-color: #eaeaea;
	height:100%;
}
#outercontainer {
	width: 980px;
	margin-left:auto;
	margin-right: auto;
	background-image: url('images/shadow.png');
	height:auto !important; 
	min-height:100%;
}
#container {
	width: 960px;
	margin-left:auto;
	margin-right: auto;
	background-color: #fff;
	position:relative;

}
#masthead {
	height: 100px;
}
#topNav {
	padding: 3px 10px 3px 10px;
	/* background-color: #ccc; */
	border-top: 3px double #ccc;
	border-bottom: 3px double #ccc;
}
#topNav  a{
	font-weight: bold;
	color: #369;
	font-family: arial;
	text-decoration: none;
}
#topNav  a:hover{
	color: #900;
	text-decoration: underline overline;
}
#sideBarLeft{
	width: 300px;
	float:left;

}
#sideBarLeftPadding{
	padding: 5px 10px 5px 10px;
	font-size: 24px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #666;
}
#contentCenter{
	width: 640px;
	float:left;
}
#contentCenterPadding{
	padding: 5px 10px 5px 10px;

}
#sideBarRight{
	width: 200px;
	float:left;
}
#sideBarRightPadding{
	padding: 5px 10px 5px 0px;
}
#footer{
	width: 980px;
	margin-left:auto;
	margin-right: auto;
	background-image: url('images/shadow.png');
	text-align: center;
	height: 20px;
	font-size: 10px;
	color: #666;
	clear: both;
}
h2 {
	font-size: 16px;
	font-family: georgia;
	color: #336;
}
#sideBarRightPadding h2{
	font-family: arial;
	font-size: 14px;
	font-weight: bold;
	background-color: #666;
	padding: 2px;
	color: #fff;
}
ul
{
  margin-left: 3;
  padding-left: 3;
}

li {
	font-size: 11px;
	

}

</style>
</head>

<body>
<div id="outercontainer">
<div id="container">
	<div id="masthead">
	<img src="images/masthead.png" width="960" height="100" alt="" />
	</div><!-- close masthead -->
	<div id="topNav">
    
    
    
	<a href="index.php">Home</a> | 
	<a href="berenice.php">Berenice</a> | 
	<a href="amontillado.php">The Cask of Amontillado</a> | 
	<a href="maelstrom.php">Descent into the Maelstrom</a> | 
	<a href="angel.php">The Angel of the Odd</a> | 
	
    
    
	</div><!-- close topNav -->
	<div id="sideBarLeft">
		<div id="sideBarLeftPadding">
	<h2>Summary</h2>

  <?php include($thisSideBarFile); ?>

		</div><!-- close sideBarLeftPadding -->
	</div><!-- close sideBarLeft -->
	<div id="contentCenter">
		<div id="contentCenterPadding">
            
        <!--
        PAGE CONTENT HERE
        -->