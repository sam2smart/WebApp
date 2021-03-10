<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Mega Play</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
             
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        
        <h1>
        <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; 
        <a href="?random">Random</a> &nbsp;
        <a href="?checker"> Checker</a></h1>
       	<hr />
        
       
        <?php
		
		if(isset($_GET['delete_id']))
		{include'inc/delete.php';}
	
		else if(isset($_GET['delete_cid']))
		{include'checker/delete.php';}
	
		else if(isset($_GET['edit_cid']))
		{include'checker/edit-data.php';}
	
		else if(isset($_GET['check_inserted']))
		{include'checker/index.php';}
	
		else if(isset($_GET['add_check']))
		{include'checker/add-data.php';}
		
		else if(isset($_GET['checker']))
		{include'checker/index.php';}
		
		else if(isset($_GET['delete_ranid']))
		{include'random/delete.php';}
		
		else if(isset($_GET['edit_ranid']))
		{include'random/edit-data.php';}
		
		else if(isset($_GET['rand_inserted']))
		{include'random/add-data.php';}
		
		else if(isset($_GET['ran_failure']))
		{include'random/add-data.php';}
		
		else if(isset($_GET['random']))
		{include'random/index.php';}
	
		else if(isset($_GET['rand_data']))
		{include'random/add-data.php';}
	
		else if(isset($_GET['edit_id']))
		{include'inc/edit-data.php';}
	
		else if(isset($_GET['add-data']))
		{include'inc/add-data.php';}
	
		else if(isset($_GET['inserted']))
		{include'inc/add-data.php';}
	
		else{include'inc/index.php';}
		
		
		?>
   
    
    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>