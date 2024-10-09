<?php 
	
	include_once("products-config.php");
	include_once(TEMPLATE_BACK . DS . 'header.php');

	// Retrieve values to display
	if (isset($_GET['edit'])) {

		$id 			= $_GET['edit'];
		$edit_state 	= true;
		$query 			= "SELECT * FROM products WHERE id = $id";
		$result 		= $link -> query($query);
		$row 			= $result -> fetch_assoc();

		$product_name 		= $row['product_name'];
		$product_desc 		= $row['product_desc'];
		$product_img 		= $row['product_img'];
		$product_pg_link 	= $row['product_pg_link'];
		$priority 			= $row['priority'];
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
							<h1 class="text-center admin-title"><?php echo $company; ?> Products</h1> <!--  .text-center -->

								<h6><?PHP sessionMessage(); ?></h6>

							<div class="form-wrapper">
								<form action="products-config.php" method="POST" class="admin-form">
									<input type="hidden" value="<?php echo $id; ?>" name="id" />
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Product Name</label>
												<input type="text" placeholder="Product Name" class="form-control" id="" name="product_name" value="<?php echo $product_name; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Product Description</label>
												<input type="text" placeholder="Product Description" class="form-control" id="" name="product_desc" value="<?php echo $product_desc; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Product Image</label>
												<input type="text" placeholder="Product Image" class="form-control" id="" name="product_img" value="<?php echo $product_img; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Product Page link</label>
												<input type="text" placeholder="Product Page link" class="form-control" id="" name="product_pg_link" value="<?php echo $product_pg_link; ?>" />
											</div> <!--  .form-group -->
										</div> <!--  .col-md-6 -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Product Priority</label>
												<input type="text" placeholder="Product Priority" class="form-control" id="" name="priority" value="<?php echo $priority; ?>" />
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
											<th>Product Name</th>
											<th>Product Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

									<?php  

										$query = "SELECT * FROM products";
										$result = $link -> query($query);

										while ( $row = $result -> fetch_assoc() ) {
										
									?>
										<tr>
											<td><?php echo $row['product_name']; ?></td>
											<td><?php echo $row['product_desc']; ?></td>
											<td>
												<a class="btn btn-warning admin-btn" href="products.php?edit=<?php echo $row['id']; ?>">Edit</a>
												<a class="btn btn-danger admin-btn admin-delete-btn" href="products-config.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure, you want to delete it?')" >Delete</a>
											</td>
										</tr>

									<?php } ?>

									</tbody>
								</table> <!--  .admin-table table table-responsive -->
							</div> <!--  .admin-table-wrapper -->
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

<?php include_once(TEMPLATE_BACK . DS . 'footer.php'); ?>