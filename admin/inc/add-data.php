<?php
require_once("class.crud.php");
$crud = new crud();
if(isset($_POST['btn-save']))
{
	$id = $_GET['edit_id'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$check1 = $_POST['check1'];
	$check2 = $_POST['check2'];
	$check3 = $_POST['check3'];
	
	if($crud->create($id,$email,$phone,$check1,$check2,$check3))
	{
		header("Location: ?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
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
            <td>E mail</td>
            <td><input type='text' name='email' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Phone</td>
            <td><input type='text' name='phone' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Data 1</td>
            <td><input type='text' name='check1' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Data 2</td>
            <td><input type='text' name='check2' class='form-control' required></td>
        </tr>
		<tr>
            <td>Data 3</td>
            <td><input type='text' name='check3' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>