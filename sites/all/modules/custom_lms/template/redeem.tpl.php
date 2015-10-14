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
$form['actions']['submit']['#value']  = "Sign Up";


?>

<div class="col-md-8 redeem-container" >
   <div class="col-md-12">
      <div id="title-header" class="col-md-12">
         <h1>Voucher <strong class="bordered">Codes</strong><strong></strong></h1>
      </div>
      <div id="title-header" class="header-text col-md-10">
         <p>Insert a description and delete me. I'm just a dummy text placeholder.
            Insert a description and delete me. I'm just a dummy text placeholder.
         </p>
      </div>
      <br />
      <br />
   </div>
   <div class="col-md-12 form-container ">
   	 <div id="validation-info-container">
	 </div>
      <div class="col-md-8 no-padding-right">
	     <p>Enter Your <strong>Voucher Code</strong> to Redeem Courses</p>
         <input class="text-full form-control form-text required" type="text" placeholder="(Only Given by Skills on Project Team)" name="voucher_code" value="" size="60" maxlength="255">
      </div>
      <div class="col-md-4 no-padding">
  	    <span class="form-submit" id="validate-voucher">VALIDATE</span>
      </div>
   </div>
   
	<?php print '<form id="'.$form['#id'].'" accept-charset="UTF-8" method="'.$form['#method'].'" action="'.$form['#action'].'">'; ?>
	<div class="col-md-12 hidden registraiton-voucher-container">
	   	<div class="">
	   	<div class="text-center">
	 	  	<p id="sign-up-text" class="text-secondary">Please Fill All Fields Below</p>
	   	</div>
			 <div class="login-field-container">
             	<div class="inner-addon left-addon">
					<?php echo render($form["field_first_name"]);?>
					<i class="glyphicon glyphicon-user"></i>
				</div>
            </div>
            <div class="login-field-container">
                <div class="inner-addon left-addon">
					<?php echo render($form["field_last_name"]);?>
					<i class="glyphicon glyphicon-folder-close"></i>
				</div>
            </div>
            
            <div class="login-field-container">
                <div class="inner-addon left-addon">
	                <?php 	echo render($form["account"]["mail"]);?>
					<i class="glyphicon glyphicon-envelope"></i>
				</div>
            </div>
            
            <div class="row hidden">
                <?php 	echo render($form["account"]["pass"]);?>
            </div>
            
            <div class="login-field-container">
	            <div class="inner-addon left-addon">
	                <?php 	echo render($form["account"]["pass"]["pass1"]);?>
					<i class="glyphicon glyphicon-lock"></i>
				</div>            
            </div>
            <div class="login-field-container">
	            <div class="inner-addon left-addon">
	                <?php 	echo render($form["account"]["pass"]["pass2"]);?>
					<i class="glyphicon glyphicon-lock"></i>
				</div>            
            </div>
            
            <div class="login-field-container no-margin">
                <div class="col-md-12 text-center">
                    <?php echo render($form['actions']);?>
                </div>
            </div>
			<?php print drupal_render_children($form);?>
		</div>
	<?php print "</form>"?>
	</div>
</div>

<div class="col-md-4">
	<div class="col-md-12 no-padding">
		<div class="student-form-container">
			<div class="form-heading-container hidden-sm hidden-xs">
				<div class="skewed-bg-top"></div>
				<div class="form-heading text-right skewed-bg">
					<div class="content">
						<h1><span class="font-light">Student</span> <strong>Support</strong></h1>
						<p id="form-text" class="font-light">We Care about you</p>
					</div>
				</div>
			</div>
			<div class="visible-xs visible-sm form-heading text-right" style="padding:10px;">
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



