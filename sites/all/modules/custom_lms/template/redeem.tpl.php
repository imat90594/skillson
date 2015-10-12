<?php 
ctools_include('modal');
ctools_modal_add_js();


$form = drupal_get_form('user_register_form');
$form["account"]["mail"]['#description'] = "";
$form['pass']['#description'] = "";
$form['field_first_name']['#required'] = true;
$form['actions']['#suffix']   = "";
$form['actions']['submit']['#value']  = "SIGN UP NOW";


$form["account"]["mail"]['#description'] = "";
$form['account']["mail"]['#attributes']['placeholder'] = t('Email');
$form['account']['mail']['#title_display'] = 'invisible';

$form['account']["pass"]["pass1"]['#description'] = "";
$form['account']["pass"]["pass1"]['#attributes']['placeholder'] = t('Password');
$form['account']["pass"]["pass1"]['#title_display'] = 'invisible';

$form['account']["pass"]["pass2"]['#description'] = "";
$form['account']["pass"]["pass2"]['#attributes']['placeholder'] = t('Confirm Password');
$form['account']["pass"]["pass2"]['#title_display'] = 'invisible';

$form['field_first_name']['#label_display'] = "hidden";
$form['field_first_name']['#attributes']['placeholder'] = array("first name");
$form['field_first_name']['#title_display'] = 'invisible';
$form['field_first_name']['#title'] = '';


$form['actions']['submit']['#value']  = "Thats It!";



?>

<div class="row">
	<div class="col-md-offset-2 col-md-8">
			<h2>Redeem Course</h2>
			<br />
		<div class="panel panel-default course-card redeem-container">
			<div class="panel-body">
				<div class="col-md-7">
					<p>Do you have a OnlineCourse Voucher Code? Please enter it below to automatically redeem a course!</p>
					<div class="form-item">
						 <div id="validation-info-container">
						 </div>
						 <label for="edit-field-first-name-und-0-value">Voucher Code<span class="form-required" title="This field is required.">*</span></label>
						 <input class="text-full form-control form-text required" type="text" name="voucher_code" value="" size="60" maxlength="255">
					</div>
					<div class="">	
					<br />
						<span class="form-submit" id="validate-voucher">VALIDATE</span>
					</div>
					
					<br />
					<br />
				</div>
				<div class="col-md-offset-1 col-md-3 hidden-xs hidden-sm">
				</div>
				
				<div class="registraiton-voucher-container hidden">
				<?php print '<form id="'.$form['#id'].'" accept-charset="UTF-8" method="'.$form['#method'].'" action="'.$form['#action'].'">'; ?>
				
				<div class="col-md-7">
						<div class="login-field-container">
							<?php echo render($form["field_first_name"]);?>
						</div>
						<div class="login-field-container">
							<?php echo render($form["field_last_name"]);?>
						</div>
						<div class="login-field-container">
							 <?php 	echo render($form["account"]["mail"]);?>
						</div>
						<div class="row hidden">
							<?php 	echo render($form["account"]["pass"]);?>
						</div>
						<div class="login-field-container">
							<?php 	echo render($form["account"]["pass"]["pass1"]);?>
						</div>
						<div class="login-field-container">
							<?php 	echo render($form["account"]["pass"]["pass2"]);?>
						</div>
						<?php print drupal_render_children($form);?>
				</div>
				<?php print "</form>"?>
				</div>
			</div>
		</div>
	</div>
</div>



