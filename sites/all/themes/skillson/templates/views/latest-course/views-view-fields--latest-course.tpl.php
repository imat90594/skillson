<div class="col-md-12 course-holder">
	<div class="col-md-4 no-padding-left">
		<div class="course-thumb" style="background-image: url('<?php print strip_tags($fields['opigno_course_image']->content);?>')">
		</div>
	</div>

	<div class="col-md-7 no-padding">
		<p class="no-margin latest-title"><strong><?php print $fields['title']->content;?></strong></p>
		<p class="no-margin latest-inst font-light"><?php print strip_tags($fields['field_publisher']->content);?></p>
		<p class="no-margin latest-price"><strong><?php print strip_tags($fields['commerce_price']->content);?></strong></p>
	</div>
</div>