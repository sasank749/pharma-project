<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">
	<h1 class="page-header text-center">CHAPTERS CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All COURSES</option>
			<?php
				$sql="select * from course";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['course']) ? $_GET['course'] : 0;
					$selected = ($catid == $catrow['courseId']) ? " selected" : "";
					echo "<option$selected value=".$catrow['courseId'].">".$catrow['courseName']."</option>";
				}
			?>
			</select>
			<a href="#addchapter" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> AddNewChapter</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				
				<th>Chapter Name</th>
				<th>Course </th>
				<th>Description</th>
				<th>Video</th>
				<th>Pdf</th>
				<th>Edit</th>
				<th>Delete</th>
				
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['course']))
					{
						$catid=$_GET['course'];
						$where = " WHERE chapter.courseId = $catid";
					}
					$sql="select * from chapter left join course on course.courseId=chapter.courseId $where order by chapter.courseId asc, chapter.chapterName asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['chapterName']; ?></td>
							<td><?php echo $row['courseName']; ?></td>
							<td><?php echo $row['chapterdescription']; ?></td>
							<td><a href="<?php if(empty($row['video'])){echo "upload/gcp.png";} else{echo $row['video'];} ?>"><img src="<?php if(empty($row['video'])){echo "upload/gcp.png";} else{echo $row['video'];} ?>" height="30px" width="30px"></a></td>
							<td><a href="<?php if(empty($row['pdf'])){echo "upload/gcp.png";} else{echo $row['pdf'];} ?>"><img src="<?php if(empty($row['pdf'])){echo "upload/gcp.png";} else{echo $row['pdf'];} ?>" height="30px" width="30px"></a></td>


							
							<td><a href="#editchapter<?php echo $row['chapterId']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
								<?php include('chapter_modalOfPharma.php'); ?>
							</td>
							<td><a href="#deletechapter<?php echo $row['chapterId']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
				<?php include('deletechapterModalOfPharma.php'); ?>
				</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>





<?php include('modalOfPharma.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'chapterOfPharma.php';
			}
			else
			{
				window.location = 'chapterOfPharma.php?course='+$(this).val();
			}
		});
	});
</script>
</body>
</html>