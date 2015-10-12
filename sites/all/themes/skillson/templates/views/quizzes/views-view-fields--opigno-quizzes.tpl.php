<?php $is_course_taken = _daisyflo_is_course_taken($fields['nid']->raw, $user->uid)?>
<div class="panel-body">
	<div class="col-lg-2 course-thumbnail-placeholder" 
			style="background-image: url('<?php print strip_tags($fields['field_cover_image']->content);?>')">
	</div>
	<div class="col-lg-10 course-card-info">
		<div class="course-card-score-info col-lg-12">
			<span class="col-lg-2 no-padding <?php print $fields['score']->raw?>">
				<bold><?php print $fields['quiz_type']->content?></bold>
			</span>
			<?php if ($fields['score']->raw >= $fields['pass_rate']->raw):?>
			<span class="col-lg-10">COMPLETED</span>
			<?php else:?>
			<span class="col-lg-10">NOT COMPLETED</span>
			<?php endif;?>
		</div>
		<h3 class="course-card-header"><?php print $fields['title']->content;?></h3>
		<div class="col-lg-7">
			<div class="course-card-body">
				<?php print $fields['body']->content;?>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="card-actions">
				<?php $progress = _daisyflo_get_course_progress($fields['nid']->raw, $user->uid);?>
				<span class="btn btn-secondary">
					<span><a href="/node/<?php print $fields['nid']->raw;?>">Read More</a></span>
				</span>
				<?php if ($is_course_taken):?>
				<span class="btn btn-primary">
					<a href="/node/<?php print $is_course_taken?>/take">Continue</a>
				</span>
				<?php else:?>
				<span class="btn btn-primary">
					<a href="/node/<?php print $fields['nid']->raw?>/take">Start Lesson</a>
				</span>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>