<?php
require_once("class.user.php");
$conn = new USER();

require_once("class.crud.php");
$crud = new crud();

if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$title = $_POST['title'];
	$mess = $_POST['mess'];
	
	if($crud->update($id,$title,$mess))
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

 $stmt = $conn->runQuery("SELECT * FROM blogsport WHERE mess_id=:id");
         $stmt->execute(array(":id"=>$_GET['edit_id']));
         $row=$stmt->fetch(PDO::FETCH_BOTH);
         
            
            
           // print($row['id']);
            
            
            
         	
         
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>E mail</td>
            <td><input type='text' class='form-control' value="<?php print($row['user_id']); ?>" disabled></td>
        </tr>
 
        <tr>
            <td>Phone</td>
            <td><input type='text' name='title' class='form-control' value="<?php print($row['title']); ?>" required></td>
        </tr>
 
        <tr>
            <td>Data 1</td>
            <td><textarea type='text' name='mess' class='form-control' required><?php print($row['message']); ?></textarea></td>
        </tr>
 
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update Post
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>