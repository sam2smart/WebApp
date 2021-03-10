

<?php
	
	$newsd = $_GET['news'];
	$stmt = $login->runQuery("SELECT * FROM blogsport where title=:title");
			$stmt->execute(array(":title"=>$newsd));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			
?>

  
<section class="banner_area" style="margin-top: -8%;">
            <div class="booking_table d_flex align-items-center">
            	
				<div class="container">
			
                <div class="page-cover">

                <!-- Contact Form --> 
				
  <div style="margin-top: 15%;"></div>
	<table class="table table-striped table-condensed table-opacity" border="1" >
	<tr>
		<th style="border: none;" colspan="2">
			
							<center><h2 style="color: #ff6800;"><i><?php print($row['title']); ?></i></h2></center>
							
			
			</th>
		</tr>
		<?php
		if(isset($_POST['news_sub']))
		{
			$uid = $_POST['uid'];
			$title = $_POST['title'];
			$email = $_POST['email'];
			$comment = $_POST['comment'];
			
			if($login->comment($uid,$title,$email,$comment))
			{
				echo "<script>window.open('?news=$title','_self');</script>";
			}else{
				//echo "<script>window.open('index.php','_self');</script>";
			}
		}
		
		
			
		?>
		
		<tr>
		
			<td style="width:10%;">
				<img src="<?php print($row['image']); ?>" style="width: 20%; margin-left: 30%;" class="rounded float-left">
			
			</td>
		</tr>
		<tr>
			<td>
				<p><?php print($row['message']); ?></p>
				
			
				
				</a>
			</td>
			
		</tr>
	</table>
 
 <?php
				$cid = $row['title'];
				
				$stmtc = $login->runQuery("SELECT * FROM comments where title=:cid");
				$stmtc->execute(array(":cid"=>$cid));
		?>
		<hr>
		<div class="container">
		<table class="table table-striped table-condensed table-opacity" border="1" >
		<tr>
			<th>Email</th>
			<th>Title</th>
			<th>Comment</th>
		</tr>
		
		
			<?php
			
				while($rowc=$stmtc->fetch(PDO::FETCH_ASSOC))
					{
					?>
					<tr>
					<td><?php print($rowc['email']); ?></td>
					<td><?php print($rowc['title']); ?></td>
					<td><?php print($rowc['comment']); ?></td>
               </tr>
                <?php
			}
			?>
		
	</table>
 </div>
 
 
<hr>
<center>
		<div style="width: 50%">
			<form method="post" action="">
				
				<input type="hidden" name="uid" class="form-control" value="<?php print($row['user_id']); ?>">
				<input type="hidden" name="title" class="form-control" value="<?php print($row['title']); ?>">
				<input type="text" name="email" class="form-control" placeholder="Email"><br>
				<textarea type="text" name="comment" class="form-control" placeholder="Comment..."></textarea><br>
				
				<button type="submit" name="news_sub">Submit
				</button>
			</form>
		</div>
</center>
				
					</div>
				</div>
            </div>
        </section>
		