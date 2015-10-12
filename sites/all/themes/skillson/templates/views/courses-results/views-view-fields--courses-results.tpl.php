<?php $is_course_taken = _daisyflo_is_course_taken($fields['nid_1']->raw, $user->uid)?>
<div class="panel panel-default course-card">
	<div class="panel-body">
		<div class="col-lg-2 course-thumbnail-placeholder" 
				style="background-image: url('<?php print strip_tags($fields['opigno_course_image']->content);?>')">
		</div>
		<div class="col-lg-10 course-card-info">
			<div class="col-lg-7">
				<h3 class="course-card-header"><?php print $fields['title']->content;?></h3>
				<div class="course-card-body">
					<p><b>Instructor:</b> <?php print $fields['field_intructor']->content;?></p>
					<p><b>Course Category:</b> <?php print $fields['opigno_course_categories']->content;?></p>
				</div>
				<div class="course-progress text-primary">
				<b>Course Progess</b>
				<div class="progress">
				<?php $course_results = _daisyflo_get_scores($fields['nid_1']->raw, $user->uid);?>
				
				<?php $progress = _daisyflo_get_course_progress($fields['nid_1']->raw, $user->uid);?>
					<div class="progress-bar" role="progressbar" aria-valuenow="70"
						aria-valuemin="0" aria-valuemax="100" style="width: <?php print $progress;?>%">
						<span class="sr-only"><?php print $progress;?>% Complete</span>
					</div>
				</div>
			</div>
			</div>
			<div class="col-lg-5">
				<div class="course-timer"> 
					<p><b>Days left of subscriptions:</b> 
					<?php //Get days remaining?>
					<?php $now = time();?>
					<?php $date_text = strip_tags($fields['opigno_user_membership_exp']->content)?>
					<?php if (!empty($date_text)):?>
					<?php $date_text = strtotime($date_text);?>
					<?php print abs(floor(($now -$date_text )/(60*60*24)));?>
					<?php endif;?>
					</p>
					<p><b><a href="/extend/<?php print $fields['nid_1']->raw?>" class="text-primary">Go Extended Access</a></b></p>
				</div>
				<div class="card-actions">
					<?php $progress = _daisyflo_get_course_progress($fields['nid_1']->raw, $user->uid);?>
					<span class="btn btn-secondary">
						<span><a href="/node/<?php print $fields['nid_1']->raw;?>/quizzes">View Units</a></span>
					</span>
					<?php if ($is_course_taken):?>
					<span class="btn btn-primary">
						<a href="/node/<?php print $is_course_taken?>/take">Continue</a>
					</span>
					<?php else:?>
					<span class="btn btn-primary">
						<?php print $fields['title_2']->content;?>
					</span>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="course-result">
	<div class="result row" id="course-result-<?php print $fields['nid_1']->raw?>">
		<div class="course-data hidden" id="course-data-<?php print $fields['nid_1']->raw?>">
		<?php $count = 0?>
			<ul>
				<?php foreach ($course_results['courses'][$fields['nid_1']->raw] as $quiz):?>
					<?php if ($quiz->type == 'quiz') :?>
					<li data-score="<?php print $quiz->percent_score?>" data-total-time="<?php print $quiz->total_time?>"><?php print $quiz->title?></li>
					<?php $count++?>
					<?php endif;?>
				<?php endforeach;?>
			</ul>
		</div>
		<?php $no_result = ''?>
		<?php if ($count == 0):?>
		<div class="result-no-result">
			<b>No result to display</b>
		</div>
		<?php $no_result = 'canvass-no-result'?>
		<?php endif;?>
		<canvas class="col-lg-12 <?php print $no_result?>" id="course-data-<?php print $fields['nid_1']->raw?>-canvas">
		</canvas>
	</div>
</div>