<?php
require_once("class.crud.php");
$crud = new crud();
if(isset($_POST['btn-save']))
{
	$id = $_POST['uid'];
	$title = $_POST['title'];
	$mess = $_POST['mess'];
	
	
	
	
		//__________________________________________________________________Image

        // Set image placement folder
        $target_dir = "image/";
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");
        

        if (!file_exists($_FILES["fileUpload"]["tmp_name"])) {
           $resMessage = array(
               "status" => "alert-danger",
               "message" => "Select image to upload."
           );
        } else if (!in_array($imageExt, $allowd_file_ext)) {
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "Allowed file formats .jpg, .jpeg and .png."
            );            
        } else if ($_FILES["fileUpload"]["size"] > 2097152) {
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "File is too large. File size should be less than 2 megabytes."
            );
        } else {
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
	
	
	
	
	
			if($crud->create($id,$title,$mess,$target_file))
			{
				header("Location: ?inserted");
			}
			else
			{
				echo "<script>alert('Data not Added successfully !!!');</script>";
				header("Location: home.php?add-data");
			}
		}
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

 	
	 <form method='post' action="" enctype="multipart/form-data">
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Title</td>
            <td><input type='text' name='title' class='form-control' required></td>
            <td><input type='hidden' name='uid' class='form-control' value="<?php print($userRow['user_email']); ?>"></td>
        </tr>
 
        <tr>
            <td>Image</td>
            <td><input type='file' name='fileUpload' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Post</td>
            <td><textarea type='text' name='mess' class='form-control' required></textarea></td>
        </tr>
 
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Add Post
			</button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>