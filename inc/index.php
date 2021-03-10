<?php
include_once 'class.crud.php';
$crud = new crud();

include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<a href="?add-data" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; New Story</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     <th>E-mail</th>
     <th>Title</th>
     <th>Post</th>
     <th></th>
     <th></th>
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
		$query = "SELECT * FROM blogsport";       
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