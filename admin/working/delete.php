<?php
require_once("class.user.php");
$conn = new USER();

require_once("class.crud.php");
$crud = new crud();

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_ranid'];
	$crud->delete($id);
	header("Location: ?random");	
}

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> record was deleted... 
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>Sure !</strong> to remove the following record ? 
		</div>
        <?php
	}
	?>	
</div>

<div class="clearfix"></div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_ranid']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>E - mail ID</th>
         <th>Gender</th>
         </tr>
         <?php
         $stmt = $conn->runQuery("SELECT * FROM random WHERE ran_id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_ranid']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['ran_id']); ?></td>
             <td><?php print($row['ran1']); ?></td>
         	 <td><?php print($row['ran1']); ?></td>
         	 <td><?php print($row['ran3']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_ranid']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['ran_id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="?random" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="?random" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>