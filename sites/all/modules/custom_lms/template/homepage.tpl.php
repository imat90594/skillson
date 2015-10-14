<div class="container no-padding-left no-padding-right home-container">
	<div class="col-md-9 no-padding-left">
	<div class="col-md-12 row-ban no-padding-left">
		<div class="welcome-banner">
			<div class="col-md-6">
				<a href="" class="btn home-btn pull-right btn-check-courses">
					<span class="glyphicon glyphicon-circle-arrow-right"></span>
					Check our Courses
				</a>
			</div>
			<div class="col-md-6 text-right">
				<h1 class="font-light">Welcome</h1>
				<p>
					Lorem ipsum description is just a dummy text 
					dolor sit amet. Lorem ipsum description is just a dummy text
					dolor site amet.
				</p>
			</div>
		</div>
	</div>
	
	<div class="col-md-12 row-ban no-padding-left ">
		<div class="col-md-6 no-padding-left">
			<div class="student-banner text-left">
				<div class="col-md-6">
					<h1 class="font-light">Student</h1>
					<strong>Support</strong>
					<p>
						Lorem ipsum description is
						dolor sit amet. Lorem ipsum description.
					</p>
				</div>
				<div class="col-md-6">
					<a href="#" class="btn home-btn supp-btn">Get in Touch</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 certificate-banner no-padding-left">
			<div class=" text-left">
				<div class="col-md-6">
					<h1 class="font-light">Certificate</h1>
					<p>
						Lorem ipsum description is
						dolor sit amet. Lorem ipsum description.
					</p>
				</div>
				<div class="col-md-6">
					<a href="#" class="btn home-btn cert-btn-home">Get Yours</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-12 no-padding-left">
		<div class="awesome-banner text-left">
			<div class="col-md-9">
				<div id="awesome-content">
					<h1 class="font-light">Awesome Lorem Ipsum Title</h1>
					<p>
						Lorem ipsum description is
						dolor sit amet. Lorem ipsum description.
						Lorem ipsum description is
						dolor sit amet. Lorem ipsum description.
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<a href="#" class="btn home-btn start-btn">Start Now</a>
			</div>
		</div>
	</div>
	</div>
	
	
	<div class="col-md-3 no-padding-right">
		<div class="col-md-12 no-padding-left no-padding-right">
			<div class="col-md-12">
				<h1 class="latest-heading"><span class="glyphicon glyphicon-circle-arrow-right"></span> Latest Courses</h1>
			</div>
			<div class="latest-course-banner text-left">
				<?php echo views_embed_view('latest_course', 'default');?>
				<div class="col-md-12 text-center">
					<a href="#" class="btn all-course-btn">All Courses</a>
				</div>
			</div>
		</div>
		<div class="col-md-12 no-padding front-student-container">
			<div class="student-form-container">
				<div class="form-heading text-right" style="padding:10px;">
					<h1><span class="font-light">Student</span> <strong>Support</strong></h1>
					<p id="form-text" class="font-light">We Care about you</p>
				</div>
				<div class="form-body">
				
					<?php 
						$block = module_invoke('webform', 'block_view', 'client-block-120');
						print render($block['content']); 
					?>
				</div>
			</div>
		</div>
	</div>
</div>