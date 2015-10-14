<div class="row notif-container" >

<?php $notification_viewed = $data->fetchAll()?>
<?php $notification_not_viewed = $notification_viewed?>
<?php $count = $notification_viewed?>

<?php $new = 0; $old = 0; ?>
<?php foreach($count as $notif):?>
	<?php
		if($notif->is_new == 1) 
			$new++;
		else
			$old++;
	?>
<?php endforeach?>

<div class="col-md-12">
	<div id="title-header" class="col-md-12">
		<h1>My <strong class="bordered">Notifica</strong><strong>tions</strong></h1>
	</div>
	<div id="title-header" class="header-text col-md-10">
		<p>Insert a description and delete me. I'm just a dummy text placeholder.
		Insert a description and delete me. I'm just a dummy text placeholder.
		</p>
	</div>

<br />
<br />
</div>

<?php if($new == 0):?>
<div class="col-md-12">
	<div class="col-md-2">
	</div>
	<div class="col-md-8 no-content text-center">
		<div class="col-md-12">
			<span class="glyphicon glyphicon-bell gl-big"></span>
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-8 no-content-divider">
			<div class="no-content-text text-left">
				<hr/>
				<h1>Sorry</h1>
				<p>You have <strong>0 Notifications</strong> at the moment
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="col-md-2">
	</div>
</div>
<?php else:?>
	<div class="col-md-12">
	<div class="pull-right notif-title-container">
	<br /> <br />
			<p class="text-title"><strong><?php echo $new?> New</strong> Notifications</p>
			<div class="pull-right">
				<span class="glyphicon glyphicon-refresh"></span>
				&nbsp;
				<span class="glyphicon glyphicon-check"></span>
			</div>
	</div>
		<?php foreach($notification_not_viewed as $notif):?>
		<?php $course = node_load($notif->course_id)?>
			<?php if($notif->is_new == 1):?>
				<div class="notif-holder col-md-12 no-padding">
					<div class="col-md-2 no-padding bell-container">
						<img src="/sites/all/themes/skillson/img/theme/bell.png" />
					</div>
					<div class="col-md-8">
						<p class="text-title"><strong>Course Expiration</p>
						<p class="notif-text">
							<?php echo $course->title?> is about to expire in <?php echo $notif->expiration_days?> days. Once it expires
							you can no longer access this course. <a class="text-primary" href="/extend/<?php echo $notif->course_id?>">Click here to extend your access!</a>
						</p>
					</div>
					<div class="col-md-2 no-padding bell-container">
						<div class="text-center">
							<span class="glyphicon glyphicon-bookmark"></span>
							&nbsp;
							<span class="glyphicon glyphicon-eye-open"></span>
						</div>
					</div>
				</div>
			<?php endif?>
		<?php endforeach?>
	</div>
<?php endif?>



<div class="col-md-12">
	<div class="pull-right notif-title-container">
		<br /> <br />
		<p class="text-title"><strong><?php echo $old?> Older</strong> Notifications</p>
		<div class="pull-right">
			<span class="glyphicon glyphicon-refresh"></span>
			&nbsp;
			<span class="glyphicon glyphicon-check"></span>
		</div>
	</div>
	<?php foreach($notification_not_viewed as $notif):?>
	<?php $course = node_load($notif->course_id)?>
		<?php if($notif->is_new == 0):?>
			<div class="notif-holder col-md-12 no-padding">
				<div class="col-md-2 no-padding bell-container">
					<img src="/sites/all/themes/skillson/img/theme/grey-bell.png" />
				</div>
				<div class="col-md-8">
					<p class="text-title"><strong>Course Expiration</p>
					<p class="notif-text">
						<?php echo $course->title?> is about to expire in <?php echo $notif->expiration_days?> days. Once it expires
						you can no longer access this course. <a class="text-primary" href="/extend/<?php echo $notif->course_id?>">Click here to extend your access!</a>
					</p>
				</div>
				<div class="col-md-2 no-padding bell-container">
					<div class="text-center">
						<span class="glyphicon glyphicon-bookmark"></span>
						&nbsp;
						<span class="glyphicon glyphicon-eye-open"></span>
					</div>
				</div>
			</div>
		<?php endif?>
	<?php endforeach?>
	</div>
</div>
