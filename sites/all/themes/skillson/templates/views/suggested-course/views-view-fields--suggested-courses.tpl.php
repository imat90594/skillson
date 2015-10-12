<div class="panel-body">
	<div class="course-card-header">
		<div class="course-thumbnail">
			<div class="course-thumbnail-placeholder" style="background-image: url('<?php print strip_tags($fields['opigno_course_image']->content);?>')">
			</div>
		</div>
		<div class="course-card-title no-margin">
			<h3 class="no-margin"><?php print $fields['title']->content;?></h3>
		</div>
		<?php if ($fields['field_hot_deal_']->content == 1):?>
		<span class="course-tag quaternary-bg-color">
			<!-- Put Price here -->
			HOT DEAL
		</span>
		<?php endif;?>
	</div>
	<div class="course-card-body no-padding-bottom">
		<p class="course-instructor no-margin">Instructor <?php print $fields['field_intructor']->content;?></p>
		<p class="course-description no-margin">
			<?php print $fields['field_features']->content;?>
		</p>
	</div>
	<div class="course-card-footer no-padding-right no-padding-top">
		<span class="course-actions col-lg-8">
			<span class="buy-now-container"> 
			<?php print $fields['add_to_cart_form']->content;?>
			</span>
		</span>
		<span class="course-tag col-lg-4 no-padding-right">
			<span class="course-price">
			<!-- Put Price here -->
			<?php print $fields['opigno_commerce_price']->content;?>
			</span>
		</span>
	</div>
</div>