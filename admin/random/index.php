<?php
include_once 'class.crud.php';
$crud = new crud();



include_once 'header.php'; 

?>

<div class="clearfix"></div>

<div class="container">
<a href="?rand_data" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
<div style="margin-left: 20%; margin-top: -41px;">
	<h4>Random Page</h4>
</div>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     
     <th>NO 1</th>
     <th>NO 2</th>
     <th>NO 3</th>
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
		$query = "SELECT * FROM random";       
		$records_per_page=10;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 
</table>
   
       
</div>

<?php include_once 'footer.php'; ?>