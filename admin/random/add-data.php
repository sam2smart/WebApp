<?php
require_once("class.crud.php");
$crud = new crud();
if(isset($_POST['btn-save']))
{
	
	$check1 = $_POST['check1'];
	$check2 = $_POST['check2'];
	$check3 = $_POST['check3'];
	
	if($crud->create($check1,$check2,$check3))
	{
		header("Location: ?rand_inserted");
	}
	else
	{
		header("Location: ?ran_failure");
	}
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['rand_inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['ran_failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
	</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'>
 
    <table class='table table-bordered'>
 
     
 
        <tr>
            <td>Rand 1</td>
            <td><input type='text' name='check1' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Rand 2</td>
            <td><input type='text' name='check2' class='form-control' required></td>
        </tr>
		<tr>
            <td>Rand 3</td>
            <td><input type='text' name='check3' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
            <a href="?random" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>