<?php require_once("../../resources/config.php"); ?>

<?php include_once(TEMPLATE_BACK . DS . 'header.php'); ?>

<?php  logged_in(); ?>

	<div class="main-wrapper">
		
		<div class="container-fluid admin-layout-container">
			<div class="row admin-layout-row">
				<div class="col-md-3 admin-layout-sidenav-cover">
					<?php include_once("inc/admin-sidenav.php"); ?>
				</div> <!--  .col-md-3 admin-layout-sidenav-cover -->
				<div class="col-md-9 admin-layout-body-cover">
					<div class="admin-main-cover">
		
						<div class="container">
							<h1 class="text-center admin-title">Welcome to Dashboard</h1>

							<p class="dashboard-intro">
								Welcome to the Admin dashboard of <?php echo $company; ?>.
								<br />
								Use navigation on the left to edit required section.
							</p> <!--  .dashboard-intro -->

						</div>
					
					</div>
				</div> <!--  .col-md-9 admin-layout-body-cover -->
			</div> <!--  .row admin-layout-row -->
		</div> <!--  .container-fluid admin-layout-container -->

	</div> <!--  .main-wrapper -->

<?php include_once(TEMPLATE_BACK . DS . 'footer.php'); ?>