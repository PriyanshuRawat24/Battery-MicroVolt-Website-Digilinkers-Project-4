<?php 
	
	include_once("product-details-config.php");
	include_once(TEMPLATE_BACK . DS . 'header.php');

	// Fetch Entries to be updated
	if (isset($_GET['edit'])) {
		$id 			= $_GET['edit'];
		$edit_state 	= true;
		$query 			= "SELECT * FROM product_details WHERE id=$id";
		$result 		= $link -> query($query);
		$row 			= $result -> fetch_assoc();

		$category 		= $row['category'];
		$series 		= $row['series'];
		$model 			= $row['model'];
		$box_type 		= $row['box_type'];
		$voltage 		= $row['voltage'];
		$capacity 		= $row['capacity'];
		$length 		= $row['length'];
		$width 			= $row['width'];
		$height 		= $row['height'];
		$water 			= $row['water'];
		$charge 		= $row['charge'];
		$warranty 		= $row['warranty'];
		$image 			= $row['image'];
		$replacement	= $row['replacement'];
		$priority		= $row['priority'];
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
							<h1 class="text-center admin-title"><?php echo $company; ?> Product Details</h1> <!--  .text-center -->

								<h6><?PHP sessionMessage(); ?></h6>					

							<div class="form-wrapper">
								<form action="product-details-config.php" method="POST" class="admin-form">
									<input type="hidden" name="id" value="<?php echo $id; ?>" />
									<div class="row">
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Category" name="category" value="<?php echo $category; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Series" name="series" value="<?php echo $series; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Model No." name="model" value="<?php echo $model; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Container Type" name="box_type" value="<?php echo $box_type; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Nominal voltage" name="voltage" value="<?php echo $voltage; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Ah Capacity" name="capacity" value="<?php echo $capacity; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Length" name="length" value="<?php echo $length; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Width" name="width" value="<?php echo $width; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Height" name="height" value="<?php echo $height; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Water Level Indicator" name="water" value="<?php echo $water; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Charge" name="charge" value="<?php echo $charge; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Total Warranty" name="warranty" value="<?php echo $warranty; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Image" name="image" value="<?php echo $image; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Replacement Warranty" name="replacement" value="<?php echo $replacement; ?>">
										</div>
										<div class="col-md-3 form-group">
											<input type="text" class="form-control" placeholder="Priority" name="priority" value="<?php echo $priority; ?>">
										</div>
										<div class="col-md-3 form-group">
											<?php if ($edit_state == false) : ?>
												<button class="btn btn-primary btn-block" type="submit" name="save">Save</button>
											<?php else : ?>
												<button class="btn btn-warning btn-block" type="submit" name="update">Update</button>
											<?php endif; ?>
										</div>
									</div>
								</form>
							</div> 

							<div class="admin-table-wrapper">
								<table class="admin-table">
									<tr>
										<th>Category</th>
										<th>Model No.</th>
										<th>Warranty*</th>
										<th>Action</th>
									</tr>

									<?php 

										$query = "SELECT * FROM product_details";
										$result = $link -> query($query);

										while( $row = $result -> fetch_assoc() ) {
									?>
									<tr>
										<td><?php echo $row['category']; ?></td>
										<td><?php echo $row['model']; ?></td>
										<td><?php echo $row['warranty']; ?></td>
										<td>
											<a class="btn btn-warning admin-btn" href="product-details.php?edit=<?php echo $row['id']; ?>">Edit</a>
											<a class="btn btn-danger admin-btn admin-delete-btn" href="product-details-config.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure, you want to delete it?')" >Delete</a>
										</td>
									</tr>

									<?php 
										}
									?>
								</table> <!--  .admin-table -->
							</div> <!--  .admin-table-wrapper -->
						</div>
					</div>
				</div>
			</div>
		</div> 

	</div> <!--  .pdt-cat-wrapper -->

<?php include_once(TEMPLATE_BACK . DS . 'footer.php'); ?>