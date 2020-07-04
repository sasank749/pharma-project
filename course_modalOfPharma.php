<!-- Edit Product -->
<div class="modal fade" id="editcourse<?php echo $row['courseId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Courses</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editcourseOfPharma.php?course=<?php echo $row['courseId']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Course Type:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['courseType']; ?>" name="cname">
                            </div>
                        </div>
						
                    </div>
					<div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Course Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['courseName']; ?>" name="cnname">
                            </div>
                        </div>
						
                    </div>
					<div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Description:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['description']; ?>" name="description">
                            </div>
                        </div>
						
                    </div>
					
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Course -->
<div class="modal fade" id="deletecourse<?php echo $row['courseId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Category</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['courseName']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="delete_courseOfPharma.php?course=<?php echo $row['courseId']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>