		<div class="digi-modal hidden">
			<button class="btn-close-modal">&times;</button>
			<h3 class="digi-modal-header">Quick Enquiry</h3>
			<form action="" class="digi-modal-form">
				<div class="form-group">
					<label>Your Name</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Email Address</label>
					<input type="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea rows="3" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn c-btn">Submit</button>
			</form>
		</div>
		<div class="digi-modal-overlay hidden"></div>
		
		<div class="footer-wrapper">

			<div class="top-footer-wrapper">
				<a class="scroll-top">Scroll to Top</a>
			</div> <!--  .top-footer-wrapper -->

			<div class="bottom-footer-wrapper">
				<div class="container">
					<p class="footer-copyright-text">
						&copy; copyright <?php echo date('Y') . ' ' . $company; ?>. All Rights Reserved. Site Created & Maintained By <a href="http://www.digilinkers.com" target="_blank" class="creator-link">Digilinkers</a>
					</p> <!--  .footer-copyright-text -->
				</div> <!--  .container -->
			</div> <!--  .bottom-footer-wrapper -->

		</div> <!--  .footer-wrapper -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="<?php echo $path; ?>js/jquery-3.4.1.min.js" ></script>

		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

		<script src="<?php echo $path; ?>js/bootstrap.min.js" ></script>

		<script src="<?php echo $path; ?>js/main.js"></script>
	</body>
</html>