<?php

require_once('../dbconfig.php');

class crud
{	

	private $db;
	
	public function __construct()
	{
		$database = new Database();
		$con = $database->dbConnection();
		$this->db = $con;
    }
	
	public function create($check1,$check2,$check3)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO random(ran1,ran2,ran3) VALUES(:check1, :check2, :check3)");
			
			$stmt->bindparam(":check1",$check1);
			$stmt->bindparam(":check2",$check2);
			$stmt->bindparam(":check3",$check3);
			$stmt->execute();
			
			
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	

	
	public function update($id,$check1,$check2,$check3)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE random SET ran1=:check1,  ran2=:check2, ran3=:check3 WHERE ran_id=:id ");
			
			$stmt->bindparam(":check1",$check1);
			$stmt->bindparam(":check2",$check2);
			$stmt->bindparam(":check3",$check3);
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
		$stmt = $this->db->prepare("DELETE FROM random WHERE ran_id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	$i = 1;
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php print($row['user_name']); ?></td>
                <td><?php print($row['user_email']); ?></td>
                <td align="center">
                <a href="?edit_ranid=<?php print($row['ran_id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="?delete_ranid=<?php print($row['ran_id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
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
