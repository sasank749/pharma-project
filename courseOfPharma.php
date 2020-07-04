<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">
	<h1 class="page-header text-center">COURSES CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="#addcourse" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span>AddNewCourse</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
			    <th>Image</th>
				<th>Course Type</th>
				<th>Course Name</th>
				<th>Description</th>
				
                 <th>Edit</th>
				 <th>Delete</th>

			</thead>
			<tbody>
				<?php
					$sql="select * from course order by courseId asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="30px"></a></td>

							<td><?php echo $row['courseType']; ?></td>
							<td><?php echo $row['courseName']; ?></td>
							<td><?php echo $row['description']; ?></td>
							


							<td>
								<a href="#editcourse<?php echo $row['courseId']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
								<?php include('course_modalOfPharma.php'); ?>
							</td>
							<td>
								 <a href="#deletecourse<?php echo $row['courseId']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('course_modalOfPharma.php'); ?>
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
</body>
</html>