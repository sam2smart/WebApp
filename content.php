  
<section class="banner_area" style="margin-top: -8%;">
            <div class="booking_table d_flex align-items-center">
            	
				<div class="container">
			
                <div class="page-cover">

                <!-- Contact Form --> 
				
  <div style="margin-top: 15%;"></div>
	<table class="table table-striped table-condensed table-opacity" border="1" >
	<tr>
		<th style="border: none;" colspan="2">
			
							<h2 style="color: #ff6800; margin-left: 35%;"><i>Latest News Post</i></h2>
							
			
			</th>
		</tr>
		<?php
		if(isset($_POST['news_sub']))
		{
			$uid = $_POST['uid'];
			$title = $_POST['title'];
			$view = $_POST['view'];
			
			if($login->view($uid,$title,$view))
			{
				echo "<script>window.open('?news=$title','_self');</script>";
			}else{
				echo "<script>window.open('index.php','_self');</script>";
			}
		}
		
		
			$stmt = $login->runQuery("SELECT * FROM blogsport");
			$stmt->execute();
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
		?>
		
		<tr>
		
			<td style="width:10%;">
				<img src="<?php print($row['image']); ?>" style="width: 70%; margin-right: 44%;" class="rounded float-left">
			
			</td>
			<td>
				
				
				<form method="post" action="">
					<input type="hidden" name="uid" value="<?php print($row['user_id']); ?>">
					<input type="hidden" name="title" value="<?php print($row['title']); ?>">
					<input type="hidden" name="view" value="1">
					<button type="submit" name="news_sub" style="border: none; background: white;">
					<p><?php print($row['user_id']); ?></p>
				<p><?php print($row['time']); ?></p>
					<h3><?php print($row['title']); ?></h3>
					</button>
				</form>
				
				</a><td>
			</td>
			
		</tr>
		<?php
			}
			?>
	</table>
 


				
					</div>
				</div>
            </div>
        </section>