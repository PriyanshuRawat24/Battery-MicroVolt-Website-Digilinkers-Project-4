<?php 
	
	include_once("carousel-config.php");
	include_once(TEMPLATE_BACK . DS . 'header.php');

	// Retrieve values to display
	if (isset($_GET['edit'])) {

		$id 		= $_GET['edit'];
		$edit_state = true;
		$query 		= "SELECT * FROM carousel WHERE id = $id";
		$result 	= $link -> query($query);
		$row 		= $result -> fetch_assoc();

		$image 		= $row['image'];
		$title 		= $row['title'];
		$caption 	= $row['caption'];
		$priority 	= $row['priority'];
	}	

?>

	<div class="main-wrapper">

		<div class="container-fluid admin-layout-container">
			<div class="row admin-layout-row">
				<div class="col-md-3 admin-layout-sidenav-cover">
					<?php include_once("inc/admin-sidenav.php"); ?>
				</div> <!--  .col-md-3 admin-layout-sidenav-cover -->
				<div class="col-md-9 admin-layout-body-cover">
					<div class="admin-main-cover">
		
						<div class="admin-form-container">
							<h1 class="text-center admin-title"><?php echo $company; ?> Carousel</h1> <!--  .text-center -->

								<h6><?PHP sessionMessage(); ?></h6>					

							<div class="form-wrapper">
								<form action="carousel-config.php" method="POST" class="admin-form">
									<input type="hidden" value="<?php echo $id; ?>" name="id" />
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Banner Image</label>
												<input type="text" placeholder="Banner Image" class="form-control" id="" name="image" value="<?php echo $image; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Banner Title</label>
												<input type="text" placeholder="Banner Title" class="form-control" id="" name="title" value="<?php echo $title; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Banner Caption</label>
												<input type="text" placeholder="Banner Caption" class="form-control" id="" name="caption" value="<?php echo $caption; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Banner Priority</label>
												<input type="text" placeholder="Banner Priority" class="form-control" id="" name="priority" value="<?php echo $priority; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group" style="padding-top: 30px;">
												<?php if($edit_state == false) { ?>
													<button class="btn btn-primary" type="submit" name="save">Submit
													</button>
												<?php } else { ?>
													<button class="btn btn-warning" type="submit" name="update">Update
													</button>
												<?php } ?>
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
									</div> <!--  .row -->
								</form>
							</div> <!--  .form-wrapper -->

							<div class="admin-table-wrapper">
								<table class="admin-table">
									<thead>
										<tr>
											<th>Banner Image</th>
											<th>Banner Title</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

									<?php  

										$query = "SELECT * FROM carousel";
										$result = $link -> query($query);

										while ( $row = $result -> fetch_assoc() ) {
										
									?>
										<tr>
											<td><?php echo $row['image']; ?></td>
											<td><?php echo $row['title']; ?></td>
											<td>
												<a class="btn btn-warning admin-btn" href="carousel.php?edit=<?php echo $row['id']; ?>">Edit</a>
												<a class="btn btn-danger admin-btn admin-delete-btn" href="carousel-config.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure, you want to delete it?')" >Delete</a>
											</td>
										</tr>

									<?php } ?>

									</tbody>
								</table> <!--  .admin-table table table-responsive -->
							</div> <!--  .admin-table-wrapper -->

						</div>
					
					</div>
				</div> <!--  .col-md-9 admin-layout-body-cover -->
			</div> <!--  .row admin-layout-row -->
		</div> <!--  .container-fluid admin-layout-container -->

	</div>

<?php include_once(TEMPLATE_BACK . DS . 'footer.php'); ?>