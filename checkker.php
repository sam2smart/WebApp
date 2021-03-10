

<?php
	$id = $_GET['checkers'];
	$stmt = $auth_user->runQuery("SELECT * FROM blogsport where mess_id=:id");
			$stmt->execute(array(":id"=>$id));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			
?>

  
<section class="banner_area" style="margin-top: -8%;">
            <div class="booking_table d_flex align-items-center">
            	
				<div class="container">
			
                <div class="page-cover">

                <!-- Contact Form --> 
				
  <div style="margin-top: 5%;"></div>
	<table class="table table-striped table-condensed table-opacity" border="1" >
	<tr>
		<th style="border: none;" colspan="">
			<?php
				$tid = $row['title'];
				
				//SELECT SUM(score) AS student_score FROM student_ans WHERE user=:user
				$stmts = $auth_user->runQuery("SELECT SUM(view) AS viewers FROM views where title=:tid");
				$stmts->execute(array(":tid"=>$tid));
				$rows=$stmts->fetch(PDO::FETCH_ASSOC);
			?>
						<h4>Viewers :  <?php print($rows['viewers']); ?></h4>	
							
			
			</th>
			<th>
				<center><h2 style="color: #ff6800;"><i><?php print($row['title']); ?></i></h2></center>
			</th>
		</tr>
		
		<tr>
		
			<td style="width:40%;">
				<img src="<?php print($row['image']); ?>" style="width: 50%; margin-left: 30%;" class="rounded float-left">
			
			</td>
			<td>
				<p><?php print($row['message']); ?></p>
				
			
				
				</a>
			</td>
			
		</tr>
		</table>
		
		<?php
				$cid = $row['title'];
				
				$stmtc = $auth_user->runQuery("SELECT * FROM comments where title=:cid");
				$stmtc->execute(array(":cid"=>$cid));
		?>
		<hr>
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
 
<hr>

				
					</div>
				</div>
            </div>
        </section>