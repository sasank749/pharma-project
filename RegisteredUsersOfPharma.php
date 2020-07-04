<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>

<div class="container">
	<h1 class="page-header text-center">See The Registerd Users</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>UserName</th>
			<th>Email</th>
			<th>UserType</th>
			<th>Delete</th>
			
        </thead>
		<tbody>
			<?php 
				$sql="select * from users order by userId desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo $row['userName']; ?></td>
						<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['usertype']; ?></td>
						
						
				<td><a href="#deleteuser<?php echo $row['userId']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
				<?php include('delete_modalOfUserPharma.php'); ?>
				</td>


					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>