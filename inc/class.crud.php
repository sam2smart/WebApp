<?php
require_once('dbconfig.php');

class crud
{	

	private $db;
	
	public function __construct()
	{
		$database = new Database();
		$con = $database->dbConnection();
		$this->db = $con;
    }
	
	public function create($id,$title,$mess,$target_file)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO blogsport(user_id,title,message,image) VALUES(:id, :title, :mess, :target_file)");
			$stmt->bindparam(":id",$id);
			$stmt->bindparam(":title",$title);
			$stmt->bindparam(":mess",$mess);
			$stmt->bindparam(":target_file",$target_file);
			$stmt->execute();
			
			
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	

	
	public function update($id,$title,$mess)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE blogsport SET title=:title, message=:mess WHERE mess_id=:id ");
			
			
			$stmt->bindparam(":title",$title);
			$stmt->bindparam(":mess",$mess);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM blogsport WHERE mess_id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['mess_id']); ?></td>
                <td><?php print($row['user_id']); ?></td>
                <td><?php print($row['title']); ?></td>
                <td><?php print($row['message']); ?></td>
                <td><a href="?checkers=<?php print($row['mess_id']); ?>" class="btn btn-default">Views & Comments</a></td>
                <td align="center">
                <a href="?edit_id=<?php print($row['mess_id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="?delete_id=<?php print($row['mess_id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
