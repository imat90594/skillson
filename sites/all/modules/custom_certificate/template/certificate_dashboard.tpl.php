<div class="row notif-container" style="border-bottom:0px">
	<div class="col-md-12">
		<div id="title-header" class="col-md-12">
			<h1>My <strong class="bordered">Notifica</strong><strong>tions</strong></h1>
		</div>
		<div id="title-header" class="header-text col-md-10">
			<p>Insert a description and delete me. I'm just a dummy text placeholder.
			Insert a description and delete me. I'm just a dummy text placeholder.
			</p>
		</div>
		<br>
	</div>
</div>

<div class="row text-center notif-cert">
	<h3 class="course-card-header no-margin no-padding"><strong>You have <?php echo count($data)?> certificate(s) ready!</strong></h3>
	<br />
</div>

<div class="row notif-container" style="border-top:0px; min-height:400px">
<?php  if($data): ?>
	<?php foreach($data as $cert):?>
		<?php $img = file_load($cert->opigno_course_image_fid); ?>
		<?php $url = file_create_url($img->uri);?>
		<div class="notif-holder col-md-12 no-padding">
			<div class="col-md-2 no-padding bell-container">
				<img class="cert" src="/sites/all/themes/skillson/img/theme/certificate.png" />
			</div>
			<div class="col-md-8">
				<p class="text-title"><strong>Congratulations! You earned a certificate for <?php echo $cert->title?></p>
				<p class="notif-text">
					<strong>Course Title: </strong> <?php echo $cert->title?> <br />
					<strong>Task Results: </strong> 100% <br />
				</p>
			</div>
			<div class="col-md-2 no-padding bell-container">
				<div class="text-center">
					<a href="/certficates/get/<?php echo $cert->gid?>">
						<span class="glyphicon glyphicon-bookmark"></span>
					</a>
					&nbsp;
					<a href="/certficates/get/<?php echo $cert->gid?>">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
				</div>
					<a class="btn btn-primary print-cert" href="/certficates/get/<?php echo $cert->gid?>">
						Download PDF
					</a>
			</div>
		</div>	
	<?php endforeach?>
<?else:?>


<div class="col-md-12">
<div class="col-md-2">
</div>
<div class="col-md-8 no-content text-center">
<div class="col-md-12">
<span class="glyphicon glyphicon-file gl-big"></span>
</div>
<div class="col-md-2">
</div>
<div class="col-md-8 no-content-divider">
<div class="no-content-text text-left">
<hr/>
<h1>Sorry</h1>
<p>You have <strong>0 Certificate</strong> at the moment
</div>
</div>
<div class="col-md-2">
</div>
</div>
<div class="col-md-2">
</div>
</div>

<?php endif?>
</div>