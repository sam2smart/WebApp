<?php
require_once("class.user.php");
$conn = new USER();

require_once("class.crud.php");
$crud = new crud();
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_ranid'];
	$check1 = $_POST['check1'];
	$check2 = $_POST['check2'];
	$check3 = $_POST['check3'];
	
	if($crud->update($id,$check1,$check2,$check3))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}

 $stmt = $conn->runQuery("SELECT * FROM random WHERE ran_id=:id");
         $stmt->execute(array(":id"=>$_GET['edit_ranid']));
         $row=$stmt->fetch(PDO::FETCH_BOTH);
         
            
            
           // print($row['id']);
            
            
            
         	
         
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
 
        <tr>
            <td>Data 1</td>
            <td><input type='text' name='check1' class='form-control' value="<?php print($row['ran1']); ?>" required></td>
        </tr>
 
        <tr>
            <td>Data 2</td>
            <td><input type='text' name='check2' class='form-control' value="<?php print($row['ran2']); ?>" required></td>
        </tr>
		<tr>
            <td>Data 3</td>
            <td><input type='text' name='check3' class='form-control' value="<?php print($row['ran3']); ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="?random" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>